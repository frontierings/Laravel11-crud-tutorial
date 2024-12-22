<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        // fetch users from the database
        // return a view with the fetched users
        $users = User::all();
        return view('user.index', compact('users'));
    }
}
