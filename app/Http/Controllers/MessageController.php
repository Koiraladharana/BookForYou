<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function create($recipientId = null)
    {
        return view('messages.create', ['recipientId' => $recipientId]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id|integer|different:' . Auth::id(),
            'message' => 'required|string|max:500',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $request->recipient_id,
            'body' => $request->message,
        ]);

        return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
    }

    public function index()
    {
        $receivedMessages = Message::where('recipient_id', Auth::id())
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);

        return view('messages.index', compact('receivedMessages'));
    }

    public function sent()
    {
        $sentMessages = Message::where('sender_id', Auth::id())
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        return view('messages.sent', compact('sentMessages'));
    }

    public function show(Message $message)
    {
        if ($message->sender_id !== Auth::id() && $message->recipient_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('messages.show', compact('message'));
    }
}