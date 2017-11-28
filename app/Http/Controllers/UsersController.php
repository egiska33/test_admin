<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function index()
    {
        $this->authorize('view', User::class);
        $users = User::paginate(9);
        return view ('users.index', compact('users'));
    }
}
