<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $companySetting = CompanySetting::firstOrFail();
        return view('enduser.contact-us', compact('companySetting'));
    }
}
