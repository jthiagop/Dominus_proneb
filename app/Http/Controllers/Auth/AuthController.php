<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function login()
    {

        //dd(Hash::make(19931993));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 'admin')
            {
                return redirect('admin/dashboard');

            }
            else if(Auth::user()->user_type == 'user')
            {
                return redirect('user/dashboard');

            }
            else if(Auth::user()->user_type == 'superadmin')
            {
                return redirect('superadmin/dashboard');

            }
            else if(Auth::user()->user_type == 'frade')
            {
                return redirect('frade/dashboard');

            }
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 'admin')
            {
                return redirect('admin/dashboard');

            }
            else if(Auth::user()->user_type == 'user')
            {
                return redirect('user/dashboard');

            }
            else if(Auth::user()->user_type == 'superadmin')
            {
                return redirect('superadmin/dashboard');

            }
            else if(Auth::user()->user_type == 'frade')
            {
                return redirect('frade/dashboard');

            }
        }
        else
        {
            return redirect() ->back()->with('error', 'Ocorreu um erro, por favor tente novamente');
        }
    }

    //recuperar senha esqucida
    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);

        if(!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', "Por favor, verifique seu email para resetar a senha.");
        }
        else {
            return redirect()->back()->with('error', "E-mail não encontrado.");
        }


    }

    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);

        } else {
            abort(404);
        }

    }
    public function PostReset($token, Request $request)
    {
        if($request->password == $request->cpassword)
        {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url(''))->with('success', 'Senha alterada com sucesso!');

        } else {
            return redirect()->back()->with('error', "As senhas digitadas não coincidem!");
        }
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
