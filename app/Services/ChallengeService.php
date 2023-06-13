<?php
namespace App\Services;


use App\Models\Achievement;
use App\Models\Challenge;
use App\Models\User;
use App\Traits\ResponseTrait;
use Symfony\Component\HttpFoundation\Response;

class ChallengeService{
    use ResponseTrait;
    function getChallenge($challenge_id,$hardcoded){
      return  Challenge::where('id',$challenge_id)->where('active', 1)->where('hard_coded',$hardcoded)->first();
    }
    function getChallenges($hardcoded){
        return  Challenge::where('hard_coded',$hardcoded)
            ->where('active',1)
            ->get();
    }
    function getChallengeByName($name){
        return  Challenge::where('title',$name)->where('active', 1)->first();
    }
}
