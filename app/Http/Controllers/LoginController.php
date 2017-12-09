<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginForm;
use App\Http\Requests\RegisterForm;
use App\Models\User;
use App\Helpers\helper;
use Hash;

class LoginController extends Controller
{
    public function login(LoginForm $request)
    {
        return $this->loginHandle($request->email, $request->password);
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
    
        return redirect('/');
    }

    public function register(Request $request)
    {
        try {
            $user = $request->all();
            $full_name = $user['full_name'];
            $email = $user['email'];
            $password = Hash::make($user['password']);
            $gender = $user['gender'];
            $level = config('setting.user');
            $filename = helper::upload($request->file('avatar'), config('setting.defaultPath'));
            $insert = array(
                'full_name' => $full_name,
                'email' => $email,
                'password' => $password,
                'gender' => $gender,
                'level' => $level,
                'avatar' => $filename,
            );
            $objuser = new User();
            $objuser->insert($insert);
            
            return $this->loginHandle($request->email, $request->password);
        } catch (\Exception $e) {
            return redirect('/');
        }
    }

    public function loginHandle($email, $password)
    {
        $user = Auth::attempt(['email' => $email, 'password' => $password]);
        if ($user) {
            if (Auth::user()->level == config('setting.admin')) {
                return redirect('admin');
            } else {
                return redirect(route('user.dashboard', Auth::user()->id));
            }
        }

        return redirect('/');
    }
}
