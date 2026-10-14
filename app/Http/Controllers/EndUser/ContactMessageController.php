<?php

namespace App\Http\Controllers\EndUser;

use App\Helpers\Notify;
use App\Http\Controllers\Controller;
use App\Http\Requests\EndUser\ContactMessageRequest;
use App\Models\ContactMessage;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function store(ContactMessageRequest $request)
    {
        ContactMessage::create($request->validated());

        Notify::success('Thanks for your message!');
        return back();
    }
}
