<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Notification;
use App\Models\NotificationType;
use App\Models\SupportTicket;
use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    }
}
