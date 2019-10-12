<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Chat extends Controller
{
    //
    protected function postMessage(Request $request){
        $request->validate([
           'message'=>'required|min:1'
        ]);
        event(new MessageEvent($request->message,Auth::user()));
    }
}
