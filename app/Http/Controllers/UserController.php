<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function account() {
        return view('users.account');
    }

    public function list() {
        if(Auth::user()->rol != 'admin') {
            return redirect()->route('index');
        }
            $users = User::get();
            return view('users.list',compact('users'));
    }
}
