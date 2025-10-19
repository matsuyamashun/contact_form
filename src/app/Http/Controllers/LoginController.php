<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index() {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        $credentails=$request->only('email','password');

        if(Auth::attempt($credentails)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        return back() ->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません',

        ])->onlyInput('email');
    }
}
