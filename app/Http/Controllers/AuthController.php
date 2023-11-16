<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Joker;
use App\Models\Notification;
use App\Models\NotificationType;
use App\Models\Subscription;
use App\Models\SupportTicket;
use App\Models\User;
use App\Models\UserPurchase;
use App\Repositories\AuthRepositoryInterface;
use App\Services\ChallengeService;
use App\Traits\AchievementTrait;
use App\Traits\NotificationTrait;
use App\Traits\ResponseTrait;
use App\Traits\SendGridTrait;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Jose\Component\Core\AlgorithmManager;
use Jose\Component\KeyManagement\JWKFactory;
use Jose\Component\Signature\Algorithm\ES256;
use Jose\Component\Signature\JWSBuilder;
use Jose\Component\Signature\Serializer\CompactSerializer;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use ResponseTrait;
    use AchievementTrait;
    use NotificationTrait;
    use SendGridTrait;
    private AuthRepositoryInterface $authRepository;
    protected $challengeService;

    public function __construct(AuthRepositoryInterface $authRepository,ChallengeService $challengeService)
    {
        $this->authRepository = $authRepository;
        $this->challengeService = $challengeService;
    }

    function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        return $this->authRepository->login($request);
    }

    function forgot_request()
    {
        return view('auth.forgot_password');
    }

    function forgot_password(ForgotRequest $request)
    {
        return $this->authRepository->forgot($request);
    }

    function reset_password($token, Request $request)
    {
        $email = $request->email;
        return view('auth.resetPassword', compact('token', 'email'));
    }

    function password_update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:admins',
            'password' => 'required|min:8|confirmed',
        ]);
        return $this->authRepository->reset($request);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    function profileUpdate(ProfileRequest $request, $id)
    {
        return $this->authRepository->profileUpdate($request, $id);
    }
    public function socialRedirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
    public function socialRedirectApple()
    {
        $state = bin2hex(random_bytes(5));
        $nonce = bin2hex(random_bytes(5));
        $url = 'https://appleid.apple.com/auth/authorize?' . http_build_query([
                'response_type' => 'code',
                'response_mode' => 'form_post',
                'client_id' => 'com.qot.queensoftenweb',
                'redirect_uri' => 'https://admin.queensoften.com/auth/callback-apple',
                'scope' => 'name email',
                'state' => $state,
                'nonce' => $nonce,
                '_token' => csrf_token(),
            ]);

        return redirect($url);
    }
    public function socialCallbackApple(Request $request){
        if (!$request->has('code') || !$request->has('state')) {
            return redirect()->route('home');
        }
        $state = $request->input('state');
        $teamId = '8YVY4D9WF9';
        $clientId = 'com.qot.queensoftenweb';
        $keyFile = asset('apple/AuthKey_65H92Z42L4.p8');
        $keyFileId = '65H92Z42L4';
        $code = $request->code;
        $redirect_uri = 'https://admin.queensoften.com/auth/callback-apple';
        $response = $this->generateAppleClientSecret($teamId,$clientId,$keyFile,$keyFileId,$code,$redirect_uri);

//        dd($response->body());
        $data = json_decode($response);
//        dd($data);
        if ($data->access_token) {
            $accessToken = $data->id_token;
            $tokenParts = explode('.', $accessToken);

            if (count($tokenParts) === 3) {
                // Extract and decode the payload part
                $payload = base64_decode($tokenParts[1]);
                $decodedPayload = json_decode($payload);
//                dd($decodedPayload);
                try {
                    $useremail = $decodedPayload->email;
                    $parts = explode('@', $useremail);

                    if (count($parts) == 2) {
                        $textBeforeAtSymbol = $parts[0];
                        $userName = $textBeforeAtSymbol;
                    } else {
                        $userName = $useremail;
                    }
                    $driver = 'apple';
                    $name = $userName;
                    $email = $useremail;
                    $picture = $user->user['picture'] ?? asset('images/profile.jpg');
                    $driver_id = $decodedPayload->sub;

                    if ($driver == 'apple') {
                        $appleUser = User::where('apple_id', $driver_id)->first();
//                dd($appleUser);
//                $newPicture = $this->modal::where('email', $request->email)->first();
                        if ($appleUser) {
                            $name = $name ?? $appleUser->name;
                            $email = $email ?? $appleUser->email;
                            $userName = $userName ?? $appleUser->username;
                            $picture = $appleUser->picture ?? $picture;
                        }
                        $key = 'apple_id';
                        $value = $driver_id;
                    } else {
                        $key = 'email';
                        $value = $email;
                    }

                    $checkTrashUser = User::where("$key", $value)->onlyTrashed()->first();

                    $checkUser = User::where("$key", $value)->where('account_status', 0)->first();
                    $newUser = User::where("$key", $value)->where('account_status', 1)->first();
                    $userModel = User::where("$key", $value)->first();

                    if ($checkTrashUser || $checkUser)
                        return $this->response(
                            false,
                            'Your account is deleted or disabled by admin. Please contact with support.',
                            '',
                            Response::HTTP_UNAUTHORIZED);
                    $subscription = Subscription::where('price',0)->first();
                    if ($key != 'apple'){
                        if($userModel){
                            $newUserName = $userModel->username;
                        }else{
                            $newUserName = $userName;
                        }
                    }
                    if ($key == 'apple'){
                        $user = User::updateOrCreate([
                            "$key" => $value,
                        ], [
                            'name' => $name,
                            'username' => $newUserName ?? '',
                            'picture' => $picture?:($userModel->picture ?? ''),
                            'online_status' => '1',
                            'google_id' => ($driver == 'google') ? $driver_id : null,
                            'facebook_id' => ($driver == 'facebook') ? $driver_id : null,
                            'apple_id' => ($driver == 'apple') ? $driver_id : null,
                            'activeAt' => now(),
                            'subscription_id' => $newUser?$newUser->subscription_id: $subscription->id,
                        ]);
                    }else{
                        $user = User::updateOrCreate([
                            "$key" => $value,
                        ], [
                            'name' => $name,
                            'username' => $newUserName,
                            'picture' => $picture?:($userModel->picture ?? ''),
                            'online_status' => '1',
                            'google_id' => ($driver == 'google') ? $driver_id : null,
                            'facebook_id' => ($driver == 'facebook') ? $driver_id : null,
                            'apple_id' => ($driver == 'apple') ? $driver_id : null,
                            'activeAt' => now(),
                            'subscription_id' => $newUser?$newUser->subscription_id: $subscription->id,
                        ]);
                    }

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
                        if ($driver == 'facebook') {
                            $challenge = $this->challengeService->getChallengeByName('Connect your Facebook account and receive a free reshuffle');
//                    if (!$this->achievementService->getAchievement($challenge->id, $user->id)) {
//                        $this->achievementService->save($challenge, $user);
//                        $achievement = $this->achievementResponse($challenge);
//                    }
                        }
                        Auth::login($user);
//                dd($user);
                        $user->tokens()->where('name', 'access_token')->delete();

                        $token = $user->createToken('access_token')->plainTextToken;
                        $userNew = User::with('purchases', 'subscription')->where("username", $user->username)->first();
                        $reward = null;
                        if ($userNew) {
                            $subscriptionType = $user->subscription->subscription_type;
//            dd($subscriptionType);
                            $maxDropHand = ($subscriptionType === 'free') ? 1 : 3;
                            $userNew->drop_hand = $maxDropHand;
                            $userNew->drop_hand_usage = 'not_used';
                            $lastLoginDate = $userNew->last_login_at;
                            $today = now()->startOfDay();
//                    $today = Carbon::now()->addMinute();
                            if (!$lastLoginDate || $lastLoginDate < $today) {
                                $userNew->last_login_at = now();
                                if ($subscriptionType == 'standard') {
                                    $userNew->save();
                                    $jokerTypes = ['big', 'small'];
                                    $jokerIds = Joker::whereIn('type', $jokerTypes)->pluck('id');
                                    $jokerNew = Joker::find($jokerIds);
                                    foreach ($jokerIds as $jokerId) {
                                        $item = UserPurchase::where('user_id', $userNew->id)->where('purchase_id', $jokerId)->where('type', 'joker')->first();
                                        if ($item) {
                                            $item->quantity = $item->quantity + 1;
                                            $item->save();
                                        } else {
                                            $jokerPurchase = new UserPurchase([
                                                'user_id' => $userNew->id,
                                                'type' => 'joker',
                                                'purchase_id' => $jokerId,
                                                'quantity' => 1,
                                            ]);
                                            $jokerPurchase->save();
                                        }
                                    }
                                    $reward = [
                                        'type' => 'joker',
                                        'sub_type'=>$jokerNew[0]->type,
                                        'quantity'=> 1
                                    ];
                                } else {
                                    $userNew->save();
                                }
                                $userNew->save();
                            }
                            return redirect()->route('home')->with('success','Logged in successfully');
                        }
                    }
                    return response(false, 'Login failed.', [], Response::HTTP_UNAUTHORIZED);
                } catch (Exception $exception) {
                    return response(false, $exception->getMessage(), [], Response::HTTP_UNAUTHORIZED);
                }
            } else {
                dd('not working');
            }
        } else {
            return redirect()->route('home');
        }
    }
    public function socialCallback($driver){
        $user = Socialite::driver($driver)->user();
        try {
            $useremail = $user->email;
            $parts = explode('@', $useremail);

            if (count($parts) == 2) {
                $textBeforeAtSymbol = $parts[0];
                $userName = $textBeforeAtSymbol;
            } else {
                $userName = $user->user->name;
            }

            $name = $user->name;
            $email = $user->email;
            $picture = $user->user['picture'] ?? asset('images/profile.jpg');
            $driver_id = $driver;

            if ($driver == 'apple') {
                $appleUser = User::where('apple_id', $driver_id)->first();
//                dd($appleUser);
//                $newPicture = $this->modal::where('email', $request->email)->first();
                if ($appleUser) {
                    $name = $name ?? $appleUser->name;
                    $email = $email ?? $appleUser->email;
                    $userName = $userName ?? $appleUser->username;
                    $picture = $appleUser->picture ?? $picture;
                }
                $key = 'apple_id';
                $value = $driver_id;
            } else {
                $key = 'email';
                $value = $email;
            }

            $checkTrashUser = User::where("$key", $value)->onlyTrashed()->first();

            $checkUser = User::where("$key", $value)->where('account_status', 0)->first();
            $newUser = User::where("$key", $value)->where('account_status', 1)->first();
            $userModel = User::where("$key", $value)->first();

            if ($checkTrashUser || $checkUser)
                return $this->response(
                    false,
                    'Your account is deleted or disabled by admin. Please contact with support.',
                    '',
                    Response::HTTP_UNAUTHORIZED);
            $subscription = Subscription::where('price',0)->first();
            if ($key != 'apple'){
                if($userModel){
                    $newUserName = $userModel->username;
                }else{
                    $newUserName = $userName;
                }
            }
            $fullName = $name;
            $nameParts = explode(" ", $fullName);
            $firstName = $nameParts[0];
            $lastName = isset($nameParts[1]) ? $nameParts[1] : '';
            if ($key == 'apple'){
                $user = User::updateOrCreate([
                    "$key" => $value,
                ], [
                    'name' => $firstName,
                    'l_name' => $lastName,
                    'username' => $newUserName ?? '',
                    'picture' => $picture?:($userModel->picture ?? ''),
                    'online_status' => '1',
                    'google_id' => ($driver == 'google') ? $driver_id : null,
                    'facebook_id' => ($driver == 'facebook') ? $driver_id : null,
                    'apple_id' => ($driver == 'apple') ? $driver_id : null,
                    'activeAt' => now(),
                    'subscription_id' => $newUser?$newUser->subscription_id: $subscription->id,
                ]);
            }else{
                $user = User::updateOrCreate([
                    "$key" => $value,
                ], [
                    'name' => $firstName,
                    'l_name' => $lastName,
                    'username' => $newUserName,
                    'picture' => $picture?:($userModel->picture ?? ''),
                    'online_status' => '1',
                    'google_id' => ($driver == 'google') ? $driver_id : null,
                    'facebook_id' => ($driver == 'facebook') ? $driver_id : null,
                    'apple_id' => ($driver == 'apple') ? $driver_id : null,
                    'activeAt' => now(),
                    'subscription_id' => $newUser?$newUser->subscription_id: $subscription->id,
                ]);
            }

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
                if ($driver == 'facebook') {
                    $challenge = $this->challengeService->getChallengeByName('Connect your Facebook account and receive a free reshuffle');
//                    if (!$this->achievementService->getAchievement($challenge->id, $user->id)) {
//                        $this->achievementService->save($challenge, $user);
//                        $achievement = $this->achievementResponse($challenge);
//                    }
                }
                Auth::login($user);
//                dd($user);
                $user->tokens()->where('name', 'access_token')->delete();

                $token = $user->createToken('access_token')->plainTextToken;
                $userNew = User::with('purchases', 'subscription')->where("username", $user->username)->first();
                $reward = null;
                if ($userNew) {
                    $subscriptionType = $user->subscription->subscription_type;
//            dd($subscriptionType);
                    $maxDropHand = ($subscriptionType === 'free') ? 1 : 3;
                    $userNew->drop_hand = $maxDropHand;
                    $userNew->drop_hand_usage = 'not_used';
                    $lastLoginDate = $userNew->last_login_at;
                    $today = now()->startOfDay();
//                    $today = Carbon::now()->addMinute();
                    if (!$lastLoginDate || $lastLoginDate < $today) {
                        $userNew->last_login_at = now();
                        if ($subscriptionType == 'standard') {
                            $userNew->save();
                            $jokerTypes = ['big', 'small'];
                            $jokerIds = Joker::whereIn('type', $jokerTypes)->pluck('id');
                            $jokerNew = Joker::find($jokerIds);
                            foreach ($jokerIds as $jokerId) {
                                $item = UserPurchase::where('user_id', $userNew->id)->where('purchase_id', $jokerId)->where('type', 'joker')->first();
                                if ($item) {
                                    $item->quantity = $item->quantity + 1;
                                    $item->save();
                                } else {
                                    $jokerPurchase = new UserPurchase([
                                        'user_id' => $userNew->id,
                                        'type' => 'joker',
                                        'purchase_id' => $jokerId,
                                        'quantity' => 1,
                                    ]);
                                    $jokerPurchase->save();
                                }
                            }
                            $reward = [
                                'type' => 'joker',
                                'sub_type'=>$jokerNew[0]->type,
                                'quantity'=> 1
                            ];
                        } else {
                            $userNew->save();
                        }
                        $userNew->save();
                    }
                    return redirect()->route('home')->with('success','Logged in successfully');
                }
            }
            return response(false, 'Login failed.', [], Response::HTTP_UNAUTHORIZED);
        } catch (Exception $exception) {
            return response(false, $exception->getMessage(), [], Response::HTTP_UNAUTHORIZED);
        }
    }
    private function generateAppleClientSecret($teamId,$clientId,$keyFileName,$keyFileId,$code,$redirectUri)
    {
        $algorithmManager = new AlgorithmManager([new ES256()]);

        $jwsBuilder = new JWSBuilder($algorithmManager);
        $jws = $jwsBuilder
            ->create()
            ->withPayload(json_encode([
                'iat' => time(),
                'exp' => time() + 3600,
                'iss' => $teamId,
                'aud' => 'https://appleid.apple.com',
                'sub' => $clientId
            ]))
            ->addSignature(JWKFactory::createFromKeyFile($keyFileName), [
                'alg' => 'ES256',
                'kid' => $keyFileId
            ])
            ->build();

        $serializer = new CompactSerializer();
        $token = $serializer->serialize($jws, 0);

        $data = [
            'client_id' => $clientId,
            'client_secret' => $token,
            'code' => $code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $redirectUri
        ];

        $ch = curl_init();
        curl_setopt_array ($ch, [
            CURLOPT_URL => 'https://appleid.apple.com/auth/token',
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_RETURNTRANSFER => true
        ]);
        $response = curl_exec($ch);
        return $response;
    }
    public function socialCallbackAppleAccess(Request $request){
        dd($request->all());
    }
}
