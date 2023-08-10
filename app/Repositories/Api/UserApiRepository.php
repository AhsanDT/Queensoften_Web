<?php

namespace App\Repositories\Api;

use App\Models\Achievement;
use App\Models\Purchase;
use App\Models\Statistics;
use App\Models\Subscription;
use App\Models\SupportTicket;
use App\Models\User;
use App\Services\AchievementService;
use App\Services\ChallengeService;
use App\Traits\AchievementTrait;
use App\Traits\NotificationTrait;
use App\Traits\ResponseTrait;
use App\Traits\SendGridTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Response;

class UserApiRepository implements UserApiRepositoryInterface
{
    use ResponseTrait;
    use AchievementTrait;
    use NotificationTrait;
    use SendGridTrait;

    protected User $modal;
    protected $challengeService;
    protected $achievementService;

    public function __construct(ChallengeService $challengeService, AchievementService $achievementService)
    {
        $this->modal = new User();
        $this->challengeService = $challengeService;
        $this->achievementService = $achievementService;
    }

    public function login($request): JsonResponse
    {
        try {

            $name = $request->name;
            $email = $request->email;
            $userName = $request->username;
            $picture = $request->picture;

            if ($request->driver == 'apple') {
                $appleUser = $this->modal::where('apple_id', $request->driver_id)->first();
                if ($appleUser) {
                    $name = $name ?? $appleUser->name;
                    $email = $email ?? $appleUser->email;
                    $userName = $userName ?? $appleUser->username;
                    $picture = $picture ?? $appleUser->picture;
                }
                $key = 'apple_id';
                $value = $request->driver_id;
            } else {
                $key = 'email';
                $value = $email;
            }

            $checkTrashUser = $this->modal->where("$key", $value)->onlyTrashed()->first();

            $checkUser = $this->modal->where("$key", $value)->where('account_status', 0)->first();
            $newUser = $this->modal->where("$key", $value)->where('account_status', 1)->first();

            if ($checkTrashUser || $checkUser)
                return $this->response(
                    false,
                    'Your account is deleted or disabled by admin. Please contact with support.',
                    '',
                    Response::HTTP_UNAUTHORIZED);
            $subscription = Subscription::where('price',0)->first();
            $user = $this->modal::updateOrCreate([
                "$key" => $value,
            ], [
                'name' => $name,
                'username' => $userName,
                'picture' => $picture ?? null,
                'online_status' => '1',
                'google_id' => ($request->driver == 'google') ? $request->driver_id : null,
                'facebook_id' => ($request->driver == 'facebook') ? $request->driver_id : null,
                'apple_id' => ($request->driver == 'apple') ? $request->driver_id : null,
                'activeAt' => now(),
                'subscription_id' => $newUser?$newUser->subscription_id: $subscription->id,
            ]);

            $user->email = $email;


            if (!isset($newUser) || (($user->id) && ($user->skin == null))) {
                $user->skin = 0;
                $user->save();
            }

            if (!isset($newUser)) {
                if ($user->email) {
                    if (config('app.sendgrid_api_key')) {
                        $this->createOrUpdateSubscriber($user);
                    }
                }
                $this->notification_save($user->id, 2);
            } else {
                $this->notification_save($user->id, 1);
            }

            if ($user->id) {
                $achievement = null;
                if ($request->driver == 'facebook') {
                    $challenge = $this->challengeService->getChallengeByName('Connect your Facebook account and receive a free reshuffle');
                    if (!$this->achievementService->getAchievement($challenge->id, $user->id)) {
                        $this->achievementService->save($challenge, $user);
                        $achievement = $this->achievementResponse($challenge);
                    }
                }
                Auth::login($user);
                $user->tokens()->where('name', 'access_token')->delete();

                $token = $user->createToken('access_token')->plainTextToken;
                $userNew = $this->modal->with('purchases', 'subscription')->where("username", $user->username)->first();
                return $this->response(true, 'Login Successfully',
                    [
                        'user' => $userNew,
                        'achievement' => $achievement,
                        'token' => $token
                    ]
                    , Response::HTTP_OK);
            }
            return $this->response(false, 'Login failed.', [], Response::HTTP_UNAUTHORIZED);
        } catch (Exception $exception) {
            return $this->response(false, $exception->getMessage(), [], Response::HTTP_UNAUTHORIZED);
        }
    }

    function achievementUpdate($userId): JsonResponse
    {
        try {
            User::where('id', $userId)->update([
                'achievement' => 0
            ]);
            return $this->response(true, '', '', Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->response(false, $exception->getMessage(), '', Response::HTTP_UNAUTHORIZED);
        }
    }

    function achievementUnlock($userId): JsonResponse
    {
        try {
            return $this->response(true, '', User::select('achievement')->where('id', $userId)->first(), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->response(false, $exception->getMessage(), '', Response::HTTP_UNAUTHORIZED);
        }
    }

    function customerDataDelete($request): JsonResponse
    {
        try {
            if ($request->user_id) {
                $user = User::where('id', $request->user_id)->withTrashed()->first();
                if ($user) {
                    Achievement::where('user_id', $user->id)->delete();
                    SupportTicket::where('user_id', $user->id)->delete();
                    Purchase::where('user_id', $user->id)->delete();
                    Statistics::where('user_id', $user->id)->delete();
                    Statistics::where('user_id', $user->id)->delete();
                    $user->tokens()->delete();
                    $user->forceDelete();
                    return $this->response(true, "Account deleted successfully.", '', Response::HTTP_OK);
                } else {
                    return $this->response(false, "Account not found.", '', Response::HTTP_UNAUTHORIZED);
                }
            }
            return $this->response(false, "Account id is required.", '', Response::HTTP_UNAUTHORIZED);

        } catch (\Exception $exception) {
            return $this->response(false, $exception->getMessage(), '', Response::HTTP_UNAUTHORIZED);

        }
    }
    public function getUser($id): JsonResponse
    {
        $user = User::with('purchases','subscription')->find($id);
        if (!$user) {
            return $this->response(false, 'User not found', '', Response::HTTP_NOT_FOUND);
        }
        return $this->response(true, "User fetched successfully", $user, Response::HTTP_OK);
    }
    public function differ($id):JsonResponse
    {
        $user = User::find($id);
        if($user->drop_hand_usage != 'used' ){
            if ($user->drop_hand > 0){
                $user->drop_hand = $user->drop_hand - 1;
                $user->save();
                if ($user->drop_hand == 0){
                    $user->drop_hand_usage = 'used';
                }
            }
            return $this->response(true, "Drop hand updated successfully", '', Response::HTTP_OK);
        }else{
            return $this->response(false, 'You have reached the limit', '', Response::HTTP_UNAUTHORIZED);
        }
    }
}
