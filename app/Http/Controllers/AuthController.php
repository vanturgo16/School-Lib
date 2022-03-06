<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        $cekuser_status=User::where('email',$email)->first();

        $dologin=Auth::attempt($credentials);

        if($dologin){
            if($cekuser_status->is_active=='1'){

                //update last login
                $update_lastlogin=User:: where('email',$email)
                ->update([
                    'last_login' => now(),
                    'login_counter' => $cekuser_status->login_counter+1,
                ]);

                return redirect('/home');
            }
            else{
                return redirect('/')->with('statusLogin','Give Access First to User');
            }
        }
        else{
            return redirect('/')->with('statusLogin','Wrong Email or Password');
        }
        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('statusLogout','Success Logout');
    }

    public function resetpass()
    {
        return view('auth.reset');
    }

    public function doreset(Request $request)
    {
        $cekUser=User::where('email',$request->email)->count();
        if($cekUser>0){
            if($request->password == $request->password_confirm){
                $updatepass=User::where('email',$request->email)
                ->update([
                    'password' => Hash::make($request->password_confirm),
                ]);

                return redirect('/')->with('statusSuccessReset','Success Reset Password, Please Login First');
            }
            else{
                return redirect('/resetpass')->with('statusNotMatch','Password Not Match');
            }
        }
    }
}
