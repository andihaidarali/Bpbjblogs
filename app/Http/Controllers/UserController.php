<?php

namespace BPBJ\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use BPBJ\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    { 
        if(Auth::user()->email == request('email')) {
        
        $this->validate(request(), [
                'nama' => 'required',
                'username' => 'required',
            ]);
            $user->name = request('nama');
            $user->username = request('username');

            $user->save();
            return back()->with(['Success' => 'Profil Berhasi Diperbarui']);
            
        }
        else
        {
            
        $this->validate(request(), [
                'nama' => 'required',
                'username' => 'required',
                'email' => 'email|required|unique:users,email,'.$this->segment(2),
            ]);
            $user->name = request('nama');
            $user->email = request('email');
            $user->username = request('username');            
            $user->save();
            return back()->with(['Success' => 'Profil Berhasi Diperbarui']);
            
        }
    }
    public function cgpass(User $user){

        if (!Hash::check(request('old_password'), Auth::user()->password))
        {
            return back()->with(['error' => 'Password Lama Tidak Cocok !']);
        }else {
            $this->validate(request(), [
                'old_password' => 'required',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' =>'required|same:password'
            ]);

            $user->password = bcrypt(request('password'));
            $user->save();
            return back()->with(['Success' => 'Password Berhasil Diganti !']);
            
        }
    }
}
