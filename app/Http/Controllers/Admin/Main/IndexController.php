<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use function GuzzleHttp\Promise\all;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $messages = Message::where('user_type', 'user')
            ->whereNotIn('thread_id', Message::select('thread_id')->where('user_type', 'admin')->get())
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.main.index', ['messages' => $messages]);
    }

    public function answer(Request $req)
    {
        $answers = $req->input('message');
        foreach ($answers as $thread_id => $answer) {
            if (empty($answer)) continue;
            $message = new Message();
            $message->name = '';
            $message->message = $answer;
            $message->thread_id = $thread_id;
            $message->user_type = 'admin';
            $message->save();
        }

        return view('admin.main.successful');
    }
}
