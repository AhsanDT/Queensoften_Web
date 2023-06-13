<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use App\Models\Admin;
use App\Traits\ResponseTrait;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Response;

class AuthRepository implements AuthRepositoryInterface
{
    use ResponseTrait;

    protected Admin $modal;

    public function __construct()
    {
        $this->modal = new Admin();
    }

    public function login($request):JsonResponse
    {
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($credentials)) {
                return $this->response(true,'Login Successfully.',[], Response::HTTP_OK);
            }
            return $this->response(false,'Email Address and/or Password is incorrect.',[], Response::HTTP_UNAUTHORIZED);

        }catch (Exception $exception){
            return $this->response(false,$exception->getMessage(),[], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function forgot($request): JsonResponse
    {
        $status = Password::broker('admins')->sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return  $this->response(true,__($status),'',Response::HTTP_OK);
        }
        return  $this->response(false,__('We have emailed your password reset link!'),'',Response::HTTP_OK);
    }

    public function reset($request):JsonResponse
    {
        try{
            $status = Password::broker('admins')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($admin, $password) {
                    $admin->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $admin->save();
                    event(new PasswordReset($admin));
                }
            );
            return  $this->response(true,__($status),'',Response::HTTP_OK);

        }catch (\Exception $exception){
            return  $this->response(false,$exception->getMessage(),'',Response::HTTP_UNAUTHORIZED);
        }

    }
    public function profileUpdate($request,$id):JsonResponse
    {
        try {
            $admin                  = Admin::find($id);
            $admin->name            = $request->name;
            $admin->email           = $request->email;
            if($request->password)
                $admin->password        = Hash::make($request->password);
            if($request->hasFile('picture')) {

                $destinationPath = public_path('AdminProfileImages');

                //give this permission on server sudo chmod -R 777 public
                if (!is_dir($destinationPath)) {  mkdir($destinationPath,755,true);  }

                $fileName           = time() . rand() . '.' . $request->picture->extension();
                $request->picture->move($destinationPath, $fileName);
                $admin->picture     = URL::to('/').'/AdminProfileImages/'.$fileName;

            }
            $admin->save();

            return  $this->response(true,'Profile updated successfully.','',Response::HTTP_OK);
        }catch (\Exception $exception){
            return  $this->error(false,$exception->getMessage(),'',Response::HTTP_UNAUTHORIZED);
        }
    }
}
