<?php

namespace App\Repositories\Api;

use App\Models\Coin;
use App\Models\Deck;
use App\Models\DeckAttachment;
use App\Models\Joker;
use App\Models\Shuffle;
use App\Models\Skin;
use App\Models\Suit;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EstoreApiRepository implements EstoreApiInterface
{
    use ResponseTrait;
    protected $model;

    public function __construct(Deck $model){
        $this->model = $model;
    }
    public function list(): JsonResponse
    {
        try {
            $deck = Deck::all();
            $shuffle = Shuffle::all();
            $joker = Joker::all();
            $suit = Suit::all();
            $skin = Skin::all();
            $coin = Coin::all();
            $imageMapper = function ($model) {
                $data = $model->toArray();
                $data['image'] = $model->mobile_image;
                unset($data['mobile_image']);

                return $data;
            };
            $data = [
                'deck' => $deck->map($imageMapper),
                'deck_count' => $deck->count(),
                'joker' => $joker->map($imageMapper),
                'joker_count' => $joker->count(),
                'shuffle' => $shuffle->map($imageMapper),
                'shuffle_count' => $shuffle->count(),
                'suit' => $suit->map($imageMapper),
                'suit_count' => $suit->count(),
                'skin' => $skin->map($imageMapper),
                'skin_count' => $skin->count(),
                'coin' => $coin,
                'coin_count' => $coin->count(),
            ];
            return $this->response(true, '', $data, Response::HTTP_OK);
        }catch (\Exception $exception){
            return $this->response(true,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }
    }
    public function deckAttachments($id): JsonResponse
    {
        try {
            $deck =  DeckAttachment::where('deck_id',$id)->get();
            $data = [
                'deck_attachments' => $deck,
                'count' => $deck->count(),
            ];
            return $this->response(true,'',$data,Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(true,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }
    }
}
