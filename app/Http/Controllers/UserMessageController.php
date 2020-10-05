<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\UserMessage;

class UserMessageController extends BaseController
{
    public function getUserMessage(Request $request, $id)
    {

        $userMessages = UserMessage::orWhere(function ($query) use ($id) {
            $query->where('fromUserId', $id)
                ->where('toUserId', session('userId'));
        })->orWhere(function ($query) use ($id) {
            $query->where('toUserId', $id)
                ->where('fromUserId', session('userId'));
        })->get();
        return view('user.message.user_message',  ['toUserId' => $id, 'messages' => $userMessages]);
    }

    function createNewUserMessage(Request $request)
    {
        $message = new UserMessage();
        $message->fromUserId = session('userId');
        $message->toUserId = $request->get('toUserId');
        $message->content = $request->get('content');
        $message->save();
        return redirect()->back();
    }

    function updateMessage(Request $request)
    {
        $message = UserMessage::find($request->get('messageId'));
        $message->content = $request->get('content');
        $message->save();
        return redirect()->back();
    }

    function deleteMessage(Request $request)
    {
        $user = UserMessage::find($request->get('messageId'));
        if ($user !== null) {
            UserMessage::destroy($request->get('messageId'));
        }
        return redirect()->back();
    }
}
