<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function create(){
        return view('admin.auth.register');
    }

    public function store(Request $request){
        $users = new User() ;

        $users = $request->email;
        $users = $request->password;
        $users = $request->name;
        $users = $request->address;
        $users = $request->phone;
        $users = $request->level;

        $users->save();
        return redirect('login');
    }

    public function login(){
        return view('admin.auth.login');
    }

    public function postlogin(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;

        if( Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('/admin')->with('success','Dang nhap thanh cong');
        }else{
            return redirect('login')->with('thong-bao','Email hoặc mật khẩu không đúng')->withInput();
        }
    }
   
}
