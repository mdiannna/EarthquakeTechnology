<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestServerRequest;
use App\User;

class UsersController extends Controller
{
   public function view() {
        $users = User::all();
        return view('users', compact('users'));
   }
}
