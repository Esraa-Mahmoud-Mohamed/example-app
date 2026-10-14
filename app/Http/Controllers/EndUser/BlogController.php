<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('enduser.blogs');
    }
}
