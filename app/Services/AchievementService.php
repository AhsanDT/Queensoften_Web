<?php
namespace App\Services;


use App\Models\Achievement;
use App\Models\User;
use App\Traits\ResponseTrait;
use Symfony\Component\HttpFoundation\Response;

class AchievementService{
    use ResponseTrait;
    function save($challenge , $user){

        $achievement = new Achievement();
        $achievement->user_id = $user->id;
        $achievement->challenge_id = $challenge->id;
        $achievement->save();

        User::where('id', $user->id)->update([
            'achievement' => 1,
        ]);
    }
    function getAchievement($challenge_id,$user_id){
        return Achievement::where('challenge_id',$challenge_id)->where('user_id',$user_id)->first();
    }
}
