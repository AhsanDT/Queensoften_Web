<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorailController extends Controller
{
    public function index(){
        return view('tutorials.index');
    }
    public function store(Request $request){
//        dd($request->all());
        $file = $request->file('image');
        $path = Storage::disk('s3')->put('images', $file, 'public');
        $tutorial = Tutorial::create(['image'=>$path,'sequence'=>$request->sequence,'description'=>$request->description]);
        if($tutorial){
            return redirect()->route('tutorials.index')->with('success','Tutorial Added Successfully');
        }else{
            return redirect()->route('tutorials.index')->with('error','Something went wrong');
        }
    }
    public function tutorialsList(){
        $tutorials = Tutorial::all();
        return json_encode(array('data' => $tutorials, 'recordsTotal' => count($tutorials), 'recordsFiltered' => count($tutorials)));
    }
    public function edit($id){
        $tutorial = Tutorial::findOrFail($id);
        return response()->json([
           'data'=>$tutorial
        ]);
    }
}
