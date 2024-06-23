<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Contact;
use App\Models\Category;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = ([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(7);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return view('admin',compact('contacts','categories'));
        }
            return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    //
}
