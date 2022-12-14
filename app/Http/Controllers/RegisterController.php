<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('Register.index',[
            "title" => "Register",
            'active' => 'register'
        ]);
    }
    public function store(Request $request){
       $validatedData = $request->validate([
        'name' => 'required|max:255|alpha',
        'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255'
       ]);
    //    $validatedData['password'] =bcrypt($validatedData['password']);
       $validatedData['password'] = Hash::make($validatedData['password']);
       User::create($validatedData);

    //    $request->session()->flash('success', 'Registration succesfull! Silahkan Login');

       return redirect('/login')->with('sukses', 'Registration succesfull! Silahkan Login');
    }
}
