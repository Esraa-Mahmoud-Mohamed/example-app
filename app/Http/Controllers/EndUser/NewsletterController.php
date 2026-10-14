<?php

namespace App\Http\Controllers\EndUser;

use App\Helpers\Notify;
use App\Http\Controllers\Controller;
use App\Http\Requests\EndUser\NewsletterRequest;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request)
    {
        Newsletter::create($request->validated());

        Notify::success('Thanks for subscribing!');
        return back();
    }
}
