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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
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
    public function socialCallback($driver){
        $user = Socialite::driver($driver)->user();
        dd($user);
        try {
            $userName = $request->username;
            $user = $this->modal->with('purchases', 'subscription')->where("username", $userName)->first();

            if ($user) {
                $subscriptionType = $user->subscription->subscription_type;

                if ($user->drop_hand_usage != 'used') {
                    $maxDropHand = ($subscriptionType === 'free') ? 1 : 3;

                    $lastLoginDate = $user->last_login_at;
                    $today = now()->startOfDay();

                    if (!$lastLoginDate || $lastLoginDate < $today) {
                        $user->last_login_at = now();
                        $user->drop_hand = $maxDropHand;
                        $user->save();

                        if ($subscriptionType == 'standard') {
                            $jokerTypes = ['big', 'small'];
                            $jokerIds = Joker::whereIn('type', $jokerTypes)->pluck('id');

                            foreach ($jokerIds as $jokerId) {
                                $item = UserPurchase::where('user_id', $user->id)
                                    ->where('purchase_id', $jokerId)
                                    ->where('type', 'joker')
                                    ->first();

                                if ($item) {
                                    $item->quantity = $item->quantity + 1;
                                    $item->save();
                                } else {
                                    $jokerPurchase = new UserPurchase([
                                        'user_id' => $user->id,
                                        'type' => 'joker',
                                        'purchase_id' => $jokerId,
                                        'quantity' => 1,
                                    ]);
                                    $jokerPurchase->save();
                                }
                            }
                        }
                    }
                }

                $checkTrashUser = $this->modal->where("username", $userName)->onlyTrashed()->first();
                $checkUser = $this->modal->where("username", $userName)->where('account_status', 0)->first();

                if ($checkTrashUser || $checkUser) {
                    return $this->response(
                        false,
                        'Your account is deleted or disabled by admin. Please contact support.',
                        '',
                        Response::HTTP_UNAUTHORIZED
                    );
                } else {
                    $credentials = $request->only('username', 'password');
                    if (auth()->attempt($credentials)) {
                        $user->tokens()->where('name', 'access_token')->delete();
                        $token = $user->createToken('access_token')->plainTextToken;

                        return $this->response(
                            true,
                            'Login Successfully',
                            [
                                'user' => $user,
                                'achievement' => null,
                                'token' => $token
                            ],
                            Response::HTTP_OK
                        );
                    } else {
                        return $this->response(false, 'Invalid Credentials.', [], Response::HTTP_UNAUTHORIZED);
                    }
                }
            } else {
                // User not found, create a new user...
                $subscription = Subscription::where('price', 0)->first();
                $userExisting = $this->modal->where("email", $request->username . '@gmail.com')->first();
                if ($userExisting) {
                    return $this->response(false, 'Email/GamerTag already exists', [], Response::HTTP_NOT_FOUND);
                }

                $user = $this->modal->create([
                    'name' => $request->username,
                    'username' => $request->username,
                    'email' => $request->username . '@gmail.com',
                    'subscription_id' => $subscription->id,
                    'password' => Hash::make($request->password),
                    'picture' => 'https://images.pexels.com/photos/989941/pexels-photo-989941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                ]);

                $subscriptionType = $user->subscription->subscription_type;

                if ($user->drop_hand_usage != 'used') {
                    $maxDropHand = ($subscriptionType === 'free') ? 1 : 3;

                    $lastLoginDate = $user->last_login_at;
                    $today = now()->startOfDay();

                    if (!$lastLoginDate || $lastLoginDate < $today) {
                        $user->last_login_at = now();
                        $user->drop_hand = $maxDropHand;
                        $user->save();
                    }
                }

                $userNew = $this->modal->with('purchases', 'subscription')->where("username", $user->username)->first();
                $credentials = $request->only('username', 'password');

                if (auth()->attempt($credentials)) {
                    $userNew->tokens()->where('name', 'access_token')->delete();
                    $token = $userNew->createToken('access_token')->plainTextToken;
                    return $this->response(
                        true,
                        'Login Successfully',
                        [
                            'user' => $userNew,
                            'achievement' => null,
                            'token' => $token
                        ],
                        Response::HTTP_OK
                    );
                } else {
                    return $this->response(false, 'Invalid Credentials.', [], Response::HTTP_UNAUTHORIZED);
                }
            }
        } catch (Exception $exception) {
            return $this->response(false, $exception->getMessage(), [], Response::HTTP_UNAUTHORIZED);
        }
    }
}
