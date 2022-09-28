<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MainRequest;
use App\Models\Thread;
use App\Models\Message;

class IndexController extends Controller
{
    public function __invoke()
    {
        $_messages = Message::all();
        $messages = [];
        foreach ($_messages as $message) {
            //понимаю что не оч, не успеваю разобраться как лучше сделать
            $type = $message->user_type == 'user' ? 'question' : 'answer';
            $messages[$message->thread_id][$type]= [
                'user_type' => $message->user_type,
                'name' => $message->name,
                'message' => $message->message,
            ];
        }

        return view('main.index', ['messages' => $messages]);
    }

    public function post(MainRequest $req)
    {
        $thread = new Thread();
        $thread->save();

        $message = new Message();
        $message->name = $req->input('name');
        $message->message = $req->input('message');
        $message->thread_id = $thread->id;
        $message->user_type = 'user';
        $message->save();

        return view('main.successful');
    }
}
