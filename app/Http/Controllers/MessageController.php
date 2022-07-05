<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(Request $request)
    {
        event(new Message($request->input('username'), $request->input('message')));

        return [];
    }
}
