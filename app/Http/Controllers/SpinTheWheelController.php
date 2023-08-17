<?php

namespace App\Http\Controllers;

use App\Models\SpinWheel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SpinTheWheelController extends Controller
{
    public function index(){
        return view('spin-the-wheel.index');
    }
    public function store(Request $request){
        $wheel = SpinWheel::create(['month' => $request->month, 'type' => $request->type]);
        if($wheel){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Spin Wheel added successfully',
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
    public function list(){
        $searchTerm = $_REQUEST['sSearch'];

        $query = SpinWheel::query();

        if (!empty($searchTerm)) {
            $query->where('month', 'like', '%'.$searchTerm.'%');
        }

        $filteredCount = $query->count();

        $wheel = $query->get();

        return response()->json([
            'data' => $wheel,
            'recordsTotal' => count($wheel),
            'recordsFiltered' => $filteredCount,
        ]);
    }
    public function destroy($id){
        try {
            $wheel = SpinWheel::where('id',$id)->get()->first();
            $wheel->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Wheel deleted successfully',
                    'status_code' => 200,
                ]
            );
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later',[], Response::HTTP_UNAUTHORIZED);
        }
    }
}
