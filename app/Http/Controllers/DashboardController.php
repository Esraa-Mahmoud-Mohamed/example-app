<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $posts = Post::count();
        $roles = Role::count();
        return view('dashboard', compact('users', 'posts', 'roles'));
    }
}
