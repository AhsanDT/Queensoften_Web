<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Joker;
use App\Models\Shuffle;
use App\Models\Skin;
use App\Models\Subscription;
use App\Models\Suit;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use DateTime;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    function index(){
        $suits = Suit::all();
        $skins = Skin::all();
        $coins = Coin::all();
        $jokers = Joker::all();
        $shuffles = Shuffle::all();
        return view('users.index',compact('suits','skins','coins','jokers','shuffles'));
    }
    function users_ajax(Request $request){
        return $this->userRepositoryInterface->users_list($request);
    }
    function delete($id){
        return $this->userRepositoryInterface->delete($id);
    }
    function disable($id){
        return $this->userRepositoryInterface->disable($id);
    }
    function activate($id){
        return $this->userRepositoryInterface->activate($id);
    }
    function viewload(Request $request){
        if($request->dataTableName == 'active'){
            return view('users.active');
        }else{
            return view('users.inactive');
        }
    }
    public function premium(){
//        dd(1);
        $searchTerm = $_REQUEST['sSearch'];
        $subscription = Subscription::where('price',0)->first();
        $query = User::where('subscription_id', '!=', $subscription->id);
        if (!empty($searchTerm)) {
            $search = $_REQUEST['sSearch'];
            $query->where(function ($query) use ($search) {
                $query->orWhere('name', 'LIKE', '%' . $search . '%');
                $query->orWhere('email', 'LIKE', '%' . $search . '%');
                $query->orWhere('username', 'LIKE', '%' . $search . '%');
            });
        }
        $data = [];
        $store_snippets = $query->get();
        if (count($store_snippets) > 0) {
            $serial = $_REQUEST['iDisplayStart'];
            foreach ($store_snippets as $row):
                $serial++;
                $obj = new \stdClass;
                $obj->serial_no = $serial;
                $obj->name = $row->name ? ucwords($row->name) : 'Apple User';
                $obj->email = $row->email ?? "email is hidden";
                $obj->picture = $row->picture;
                if($row->activeAt) {
                    $start_date = new DateTime($row->activeAt);
                    $diffInMinutes = $start_date->diff(new DateTime(now()));
                    if (isset($diffInMinutes->i) && ($diffInMinutes->i < 5)) {
                        $obj->online_status = true;
                    } else {
                        $obj->online_status = false;
                    }
                }else{
                    $obj->online_status = false;
                }
                $obj->username = $row->username ?? "appleuser";
                $obj->account_status = $row->account_status;
                $obj->actions = '';
                $obj->id = $row->id;
                $obj->delete_route = route('users.delete', [$row->id]);
                if ($row->account_status == 1) {
                    $obj->disable_route = route('users.disable', [$row->id]);
                    $obj->account_status_name = "Disable";

                } else {
                    $obj->disable_route = route('users.activate', [$row->id]);
                    $obj->account_status_name = "Activate";

                }
                $data[] = $obj;
            endforeach;
        }

        $filtered_count = $query->count();

//        $users = $query->get();

        return response()->json([
            'data' => $data,
            'recordsTotal' => $filtered_count, // Total count of all eligible users
            'recordsFiltered' => $filtered_count, // Total count after applying filters
        ]);
    }
}
