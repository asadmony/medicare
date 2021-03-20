<?php

namespace App\Http\Controllers;

use App\Model\Message;
use App\Model\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function send(User $messageTo, Request $request)
    {
        $messageFrom = auth()->user();
        if ($request->message == '' || $request->message == null) {
            return redirect()->back();
        }
        if($messageFrom->id == $messageTo->id)
        {
            abort(401);
        }
        Message::where('last',1)
        ->where(function ($f) use ($messageTo, $messageFrom) {
            $f->where([
                ['userto_id', '=', $messageTo->id],
                ['userfrom_id', '=',  $messageFrom->id]
            ])
            ->orWhere([
                ['userto_id', '=', $messageFrom->id],
                ['userfrom_id', '=',  $messageTo->id]
            ]);
        })->update(['last'=> 0]);


        $messageItem = new Message;
        $messageItem->userfrom_id = $messageFrom->id;
        $messageItem->userto_id = $messageTo->id;
        $messageItem->company_id = $request->company_id ? $request->company_id : null;
        $messageItem->message = $request->message;
        $messageItem->role_from = $request->role_from ? $request->role_from : null;
        $messageItem->messageable_id = $request->messageable_id ? $request->messageable_id : null;
        $messageItem->messageable_type = $request->messageable_type ? $request->messageable_type : null;
        $messageItem->save();

        return redirect()->back();
    }
    public function read(User $userTo)
    {
        menuSubmenu('Messages','Messages');
        $messageFrom = auth()->user();
        $messageTo = $userTo;
        if($messageFrom->id == $messageTo->id)
        {
            abort(401);
        }

        $conversation = auth()->user()->messageWithUser($userTo);
        $conversations = auth()->user()->messageContacts();


        return view('user.messages', compact('messageFrom', 'messageTo', 'conversation', 'conversations'));
    }
    public function readAll()
    {
        menuSubmenu('Messages','Messages');
        $messageFrom = auth()->user();
        $conversations = auth()->user()->messageContacts();
        if ($conversations->count() > 0) {
            if ($conversations[0]->userto_id == $messageFrom->id) {
                $messageTo = User::find($conversations[0]->userfrom_id);
            }else{
                $messageTo = User::find($conversations[0]->userto_id);
            }
            $conversation = $conversations[0]->conversation($messageTo->id,$messageFrom->id);
        }else{
            $messageTo =null;
            $conversation = null;
        }
        return view('user.messages', compact('messageFrom', 'messageTo', 'conversation', 'conversations'));
    }
}
