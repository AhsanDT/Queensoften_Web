<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCoinRequest;
use App\Http\Requests\AddJokerRequest;
use App\Http\Requests\AddShuffleRequest;
use App\Models\Coin;
use App\Models\Joker;
use App\Models\Shuffle;
use App\Models\Skin;
use App\Models\Suit;
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
    public function addShuffle(AddShuffleRequest $request){
//        dd($request->all());
        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'images/' . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $shuffle = Shuffle::create(['image' => $filePath, 'value' => $request->value, 'coins' => $request->coins]);
        if($shuffle){
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

        $shuffle = $query->get();

        return response()->json([
            'data' => $shuffle,
            'recordsTotal' => count($shuffle),
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
    public function addJoker(AddJokerRequest $request){
        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'images/' . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $joker = Joker::create(['image' => $filePath, 'name' => $request->name, 'coins' => $request->coins]);
        if($joker){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Joker added successfully',
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
    public function jokerList(){
        $searchTerm = $_REQUEST['sSearch'];

        $query = Joker::query();

        if (!empty($searchTerm)) {
            $query->where('name', 'like', '%'.$searchTerm.'%')->orWhere('coins', 'like', '%'.$searchTerm.'%');
        }

        $filteredCount = $query->count();

        $jokers = $query->get();

        return response()->json([
            'data' => $jokers,
            'recordsTotal' => count($jokers),
            'recordsFiltered' => $filteredCount,
        ]);
    }
    public function jokerDelete($id){
        try {
            $joker = Joker::where('id',$id)->get()->first();
            Storage::disk('s3')->delete($joker->image);
            $joker->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Joker deleted successfully',
                    'status_code' => 200,
                ]
            );
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function addSuit(AddJokerRequest $request){
        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'images/' . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $suit = Suit::create(['image' => $filePath, 'name' => $request->name, 'coins' => $request->coins]);
        if($suit){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Suit added successfully',
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
    public function suitList(){
        $searchTerm = $_REQUEST['sSearch'];

        $query = Suit::query();

        if (!empty($searchTerm)) {
            $query->where('name', 'like', '%'.$searchTerm.'%')->orWhere('coins', 'like', '%'.$searchTerm.'%');
        }

        $filteredCount = $query->count();

        $suit = $query->get();

        return response()->json([
            'data' => $suit,
            'recordsTotal' => count($suit),
            'recordsFiltered' => $filteredCount,
        ]);
    }
    public function suitDelete($id){
        try {
            $suit = Suit::where('id',$id)->get()->first();
            Storage::disk('s3')->delete($suit->image);
            $suit->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Suit deleted successfully',
                    'status_code' => 200,
                ]
            );
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function addSkin(AddJokerRequest $request){
        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'images/' . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $skin = Skin::create(['image' => $filePath, 'name' => $request->name, 'coins' => $request->coins]);
        if($skin){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Skin added successfully',
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
    public function skinList(){
        $searchTerm = $_REQUEST['sSearch'];

        $query = Skin::query();

        if (!empty($searchTerm)) {
            $query->where('name', 'like', '%'.$searchTerm.'%')->orWhere('coins', 'like', '%'.$searchTerm.'%');
        }

        $filteredCount = $query->count();

        $skin = $query->get();

        return response()->json([
            'data' => $skin,
            'recordsTotal' => count($skin),
            'recordsFiltered' => $filteredCount,
        ]);
    }
    public function skinDelete($id){
        try {
            $skin = Skin::where('id',$id)->get()->first();
            Storage::disk('s3')->delete($skin->image);
            $skin->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Skin deleted successfully',
                    'status_code' => 200,
                ]
            );
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function addCoin(AddCoinRequest $request){
        $coin = Coin::create(['coins' => $request->coins,'price' => $request->price]);
        if($coin){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Coin added successfully',
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
    public function coinList(){
        $searchTerm = $_REQUEST['sSearch'];

        $query = Coin::query();

        if (!empty($searchTerm)) {
            $query->where('coins', 'like', '%'.$searchTerm.'%')->orWhere('price', 'like', '%'.$searchTerm.'%');
        }

        $filteredCount = $query->count();

        $coin = $query->get();

        return response()->json([
            'data' => $coin,
            'recordsTotal' => count($coin),
            'recordsFiltered' => $filteredCount,
        ]);
    }
    public function coinDelete($id){
        try {
            $coin = Coin::where('id',$id)->get()->first();
            $coin->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Coin deleted successfully',
                    'status_code' => 200,
                ]
            );
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later',[], Response::HTTP_UNAUTHORIZED);
        }
    }
}
