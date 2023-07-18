<?php

namespace App\Http\Controllers;

use App\Models\Shuffle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class EStoreController extends Controller
{
    function index(){
        return view('e-store.index');
    }

    function designCard(){
        return view('e-store.card-design');
    }
    public function addShuffle(Request $request){
//        dd($request->all());
        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'images/' . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $tutorial = Shuffle::create(['image' => $filePath, 'value' => $request->value, 'coins' => $request->coins]);
        if($tutorial){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Tutorial added successfully',
                    'status_code' => 200,
                ]
            );
        }else{
            return response()->json([
                'message' => 'error',
                'success' => false
            ])  ;
        }
    }
    public function shuffleList(){
        $searchTerm = $_REQUEST['sSearch'];

        $query = Shuffle::query();

        if (!empty($searchTerm)) {
            $query->where('value', 'like', '%'.$searchTerm.'%')->orWhere('coins', 'like', '%'.$searchTerm.'%');
        }

        $filteredCount = $query->count();

        $tutorials = $query->get();

        return response()->json([
            'data' => $tutorials,
            'recordsTotal' => count($tutorials),
            'recordsFiltered' => $filteredCount,
        ]);
    }
    public function shuffleDelete($id){
        try {
            $shuffle = Shuffle::where('id',$id)->get()->first();
            Storage::disk('s3')->delete($shuffle->image);
            $shuffle->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Shuffle deleted successfully',
                    'status_code' => 200,
                ]
            );
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later',[], Response::HTTP_UNAUTHORIZED);
        }
    }
}
