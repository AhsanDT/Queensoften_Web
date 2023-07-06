<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChallengeRequest;
use App\Models\Challenge;
use App\Models\Prize;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ChallengeController extends Controller
{
    use ResponseTrait;
    protected $prize;
    protected $challenge;

    function __construct(Prize $prize,Challenge $challenge){
        $this->prize = $prize;
        $this->challenge = $challenge;
    }

    function index(){
        $prizes = $this->prize->all();
        return view('challenges.index',compact('prizes'));
    }
    function store(ChallengeRequest $request){
        return view('challenges.create');
        try {
            $date = explode('-',$request->date);
            $challenge = new $this->challenge;
            $challenge->date =  date('m-d-Y', strtotime($request->date));
            $challenge->hour = $request->hour;
            $challenge->minute = $request->minute;
            $challenge->title = $request->title;
            $challenge->games = $request->games;
            $challenge->days = json_encode($request->days);
            $challenge->occurrence = $request->occurrence;
            $challenge->prize_id = $request->prize;
            $challenge->quantity = $request->quantity;
            $challenge->save();

            return $this->response(true,'Challenge created successfully',[],Response::HTTP_OK);
        }catch (\Exception $exception){
            return $this->response(false,$exception->getMessage(),[],Response::HTTP_UNAUTHORIZED);
        }
    }
    function create(Request $request){
        return view('challenges.create');
        try {
            $date = explode('-',$request->date);
            $challenge = new $this->challenge;
            $challenge->date =  date('m-d-Y', strtotime($request->date));
            $challenge->hour = $request->hour;
            $challenge->minute = $request->minute;
            $challenge->title = $request->title;
            $challenge->games = $request->games;
            $challenge->days = json_encode($request->days);
            $challenge->occurrence = $request->occurrence;
            $challenge->prize_id = $request->prize;
            $challenge->quantity = $request->quantity;
            $challenge->save();

            return $this->response(true,'Challenge created successfully',[],Response::HTTP_OK);
        }catch (\Exception $exception){
            return $this->response(false,$exception->getMessage(),[],Response::HTTP_UNAUTHORIZED);
        }
    }
    function challengeList(Request $request)
    {
        $qry = Challenge::join('prizes', 'challenges.prize_id', '=','prizes.id','inner')
            ->select('challenges.id','challenges.title','challenges.date','challenges.hour','challenges.minute','challenges.days','challenges.games',
                'challenges.occurrence','challenges.active','prizes.name')->orderBy('id',"ASC");
        if (!empty($_REQUEST['sSearch'])) {
            $search = $_REQUEST['sSearch'];
            $qry->where(function ($query) use ($search) {
                $query->orWhere('challenges.title', 'ilike', '%' . $search . '%');
            });
        }
        if ($_REQUEST['iDisplayStart']) {
            $offset = $_REQUEST['iDisplayStart'];
            $qry->offset($offset);
        }
        if ($_REQUEST['iDisplayLength']) {
            $limit = $_REQUEST['iDisplayLength'];
            $qry->limit($limit);
        }
        if (isset($_REQUEST['iSortCol_0']) && isset($_REQUEST['sSortDir_0'])) {
            $sort_order = $_REQUEST['sSortDir_0'];
            $sort_column_number = $_REQUEST['iSortCol_0'];
            $sort_column = [
                0 => 'challenges.title'];
            if (!array_key_exists($sort_column_number, $sort_column)) {
                $column = 'id';
                $sort_order = 'ASC';
            } else {
                $column = $sort_column[$sort_column_number];
            }
            $qry->orderBy($column, $sort_order);
        }
        $store_snippets = $qry->get();
        $data = [];

        if (count($store_snippets) > 0) {
            $serial = $_REQUEST['iDisplayStart'];
            foreach ($store_snippets as $row):
                $serial++;
                $obj = new \stdClass;
                $obj->serial_no = $serial;
                $obj->title = $row->title;
//                dump($row->date);
                $myDateTime = \DateTime::createFromFormat('m-d-Y', $row->date);
                $newDateString = $myDateTime->format('m/d/Y');
                $obj->date = $newDateString;
                $obj->occurrence = $row->occurrence;
                $obj->games = $row->games;
                $obj->days = $this->getDaysFirstValue(json_decode($row->days));
                $minute = $row->minute;
                if($row->minute < 10 && !$this->checkPrefix($row->minute))
                    $minute = '0'.$row->minute;

                $obj->time = $row->hour.':'.$minute.':00';
                $obj->prize = ucwords($row->name);
                $obj->active = $row->active;
                $obj->actions = '';
                $obj->id = $row->id;
                $obj->delete_route = route('challenges.delete', [$row->id]);
                if($row->active == 1){
                    $obj->disable_route = route('challenges.disable', [$row->id]);
                    $obj->account_status_name = "Disable";
                }else{
                    $obj->disable_route = route('challenges.activate', [$row->id]);
                    $obj->account_status_name = "Activate";
                }
                $data[] = $obj;
            endforeach;

        }

        $qry = Challenge::select('challenges.title','challenges.date','challenges.hour','challenges.minute','challenges.games',
            'challenges.occurrence','challenges.active','prize.name')
            ->join('prizes', 'prizes.id', '=', 'challenges.prize_id', 'inner');
        if (!empty($_REQUEST['sSearch'])) {
            $search = $_REQUEST['sSearch'];
            $qry->where(function ($query) use ($search) {
                $query->orWhere('challenges.title', 'ilike', '%' . $search . '%');
            });
        }
        $filtered_count = $qry->count();
        $count = Challenge::select('challenges.title','challenges.date','challenges.hour','challenges.minute','challenges.games',
            'challenges.occurrence','challenges.active','prize.name')
            ->join('prizes', 'prizes.id', '=', 'challenges.prize_id', 'inner')->count();
        return json_encode(array('data' => $data, 'recordsTotal' => $count, 'recordsFiltered' => $filtered_count));
    }
    public function disable($id): JsonResponse
    {
        try{
            $challenge =  Challenge::find($id);
            if($challenge){
                $challenge->active = 0;
                $challenge->save();
                return $this->response(true,'Challenge Disabled Successfully',[], Response::HTTP_OK);
            }
            return $this->response(false,'Challenge not found',[], Response::HTTP_UNAUTHORIZED);
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function activate($id): JsonResponse
    {
        try{
            $challenge =  Challenge::find($id);
            if($challenge){
                $challenge->active = 1;
                $challenge->save();
                return $this->response(true,'Challenge Activated Successfully.',[], Response::HTTP_OK);
            }
            return $this->response(false,'Challenge not found.',[], Response::HTTP_UNAUTHORIZED);
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function delete($id){
        try{
            $challenge =  Challenge::find($id);
            if($challenge) {
                if ($challenge->hard_coded == true || $challenge->default == true) {
                    return $this->response(false, "You can't delete hardcoded or default challenge.", [], Response::HTTP_UNAUTHORIZED);
                }
                if (count($challenge->achievements) > 0) {
                    return $this->response(false, "You can't delete this challenge. Because this is associated with achievements.", [], Response::HTTP_UNAUTHORIZED);
                }
                $challenge->delete();
                return $this->response(true,'Challenge deleted successfully.',[], Response::HTTP_OK);
            }
            return $this->response(false,'Challenge not found.',[], Response::HTTP_UNAUTHORIZED);
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function checkPrefix($number): bool
    {
        if (preg_match("~^0\d+$~", $number)) {
            return true;
        }
        return false;
    }
    public function getDaysFirstValue($days){
        $daysArray = [];
        foreach ($days as $day){
            if($day == 'Sunday'){
                array_push($daysArray,'Su');
            }else if ($day == 'Monday'){
                array_push($daysArray,'M');
            }else if ($day == 'Tuesday'){
                array_push($daysArray,'T');
            }else if ($day == 'Wednesday'){
                array_push($daysArray,'W');
            }else if ($day == 'Thursday'){
                array_push($daysArray,'Th');
            }else if ($day == 'Friday'){
                array_push($daysArray,'F');
            }else if ($day == 'Saturday'){
                array_push($daysArray,'Sa');
            }
        }
        return implode(' ',$daysArray);
    }
}
