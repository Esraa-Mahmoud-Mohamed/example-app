<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('enduser.shop');
    }
}
