<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryModeRequest;
use App\Models\StoryMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryModeController extends Controller
{
    function index(){
        $stories = StoryMode::all();
        return view('storymode.index',compact('stories'));
    }

    function storyModeDetail($id){
        $story = StoryMode::find($id);
        return view('storymode.storymode-detail',compact('story'));
    }

    function storyModeCreate(){
        return view('storymode.create-storymode');
    }

    public function storyModeStory(StoryModeRequest $request){
//        dd($request->all());
        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'images/' . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $tutorial = StoryMode::create(['image' => $filePath,'title'=>$request->title, 'start_date' => $request->start_date,'end_date'=>$request->end_date, 'description' => $request->description]);
        if($tutorial){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Story added successfully',
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
    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $stories = StoryMode::where('title', 'like', '%' . $searchTerm . '%')->get();

        return view('partials.story_list', compact('stories'));
    }
    public function destroy($id){
        $story = StoryMode::find($id);
        Storage::disk('s3')->delete($story->image);
        $story->delete();
        return redirect()->route('storymode.index');
    }


}
