<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string|max:30',
            'username'=>'required|string|max:30|unique:users|alpha_dash',
            'email'=>'required|unique:users',
            'password'=>'required|min:5'
        ]);
        
        $validatedData['password']=Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success','berhasil register');

    }
}
