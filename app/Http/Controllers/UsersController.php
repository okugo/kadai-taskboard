<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $taskboards = $user->taskboards()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'taskboards' => $taskboards,
            ];
            $data += $this->counts($user);

            return view('users.show', $data);
        }else {
            return view('welcome');
        }
    }
}