<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use URL;
use Session;

class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }
    public function postSignup(Request $request){
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);
        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        Auth::login($user);
        if(Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }
        return redirect()->route('product.index');
    }
    public function getSignin(){
        Session::put('oldUrl', URL::previous());
        return view('user.signin');
    }
    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        // if(Auth::attempt([
        //     'email'=>$request->input('email'),
        //     'password'=>$request->input('password')
        // ])){
        //     return redirect()->route('user.profile');
        // };
        if(! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your password'
            ]);
        }
        if(Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }
        return redirect()->route('user.profile')->with('success', 'user logged in');
    }
    public function getProfile(){
        return view('user.profile');
    }
    public function getLogout(){
        // Auth::logout();
        auth()->logout();
        return redirect()->route('product.index')->with('success', 'user logged out');
    }
}
