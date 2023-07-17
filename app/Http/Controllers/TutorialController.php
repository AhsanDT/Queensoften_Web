<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTutorialRequest;
use App\Http\Requests\TutorialRequest;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class TutorialController extends Controller
{
    public function index(){
        return view('tutorials.index');
    }
    public function store(TutorialRequest $request){
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $tutorial = Tutorial::create(['image' => $filePath, 'sequence' => $request->sequence, 'description' => $request->description]);
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
    public function tutorialsList(){
        $searchTerm = $_REQUEST['sSearch'];

        $query = Tutorial::query();

        if (!empty($searchTerm)) {
            $query->where('description', 'like', '%'.$searchTerm.'%');
            // Add more conditions or filters based on your requirements
        }

        $filteredCount = $query->count();

        $tutorials = $query->get();

        return response()->json([
            'data' => $tutorials,
            'recordsTotal' => count($tutorials),
            'recordsFiltered' => $filteredCount,
        ]);
    }
    public function edit($id){
        $tutorial = Tutorial::findOrFail($id);
        return response()->json([
           'data'=>$tutorial
        ]);
    }
    public function update(EditTutorialRequest $request,$id){
        $tutorial = Tutorial::where('id',$id)->get()->first();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'images/' . $name;
            Storage::disk('s3')->delete($tutorial->image);
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $tutorial = Tutorial::where('id',$id)->update(['image' => $filePath, 'sequence' => $request->sequence, 'description' => $request->description]);
        }
        else{
            $tutorial = Tutorial::where('id',$id)->update(['sequence' => $request->sequence, 'description' => $request->description]);
        }
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
    public function destroy($id){
        try {
            $tutorial = Tutorial::where('id',$id)->get()->first();
            Storage::disk('s3')->delete($tutorial->image);
            $tutorial->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Tutorial deleted successfully',
                    'status_code' => 200,
                ]
            );
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later',[], Response::HTTP_UNAUTHORIZED);
        }
    }
}
