<?php

namespace App\Http\Controllers\EndUser;

use App\Helpers\Notify;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)
            ->latest()
            ->paginate(5);

        return view('enduser.account', compact(
            'user',
            'orders'
        ));
    }

    public function orders()
    {
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)
            ->latest()
            ->paginate(5);

        return view('enduser.account', compact(
            'user',
            'orders'
        ));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('enduser.account', compact('user'));
    }
}