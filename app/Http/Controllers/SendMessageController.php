<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{

    public function index()
    {
        return view('message.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            // 'from_id' => 'required',
            // 'to_id' => 'required',
            // 'post_id' => 'required',
            'message' => 'required',
        ]);
        Message::create([
            'from_id' => $request->fromId,
            'to_id'   => $request->toId,
            'post_id' => $request->postId,
            'body'    => $request->message

        ]);
    }

    public function chatWithThatUser()
    {

        $messages  = Message::where('from_id', auth()->id())->orWhere('to_id', auth()->id())->get();


        // get the unique receivers which the logged in user messages them
        $users = $messages->map(function ($message) {

            if ($message->from_id === auth()->id()) {
                return $message->receiver;
            }
            // return $message->sender;
        })->unique();
        return $users;
    }

    public function showMessages(Request $request, $id)
    {
        $message = Message::with(['user', 'ads'])->where('to_id', auth()->id())->where('from_id', $id)->orWhere('from_id', auth()->id())->where('to_id', $id)->get();

        return $message;
    }

    public function startConversation(Request $request)
    {
        $message = Message::create([
            'from_id' => auth()->id(),
            'to_id'   => $request->to_id,
            'body'    => $request->message
        ]);

        return $message;
    }
}
