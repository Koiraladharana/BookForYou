<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class MessageController extends Controller
{


    public function create(Request $request, $recipient_id = null)
{
    // Prioritize the route parameter if it's present
    $recipientId = $recipient_id;

    // If the route parameter is null, check for it in the query parameters
    if (is_null($recipientId)) {
        $recipientId = $request->query('recipientId');
    }

    $users = User::where('id', '!=', Auth::id())->orderBy('name')->get(); // Fetch all users except the current one
    return view('messages.create', ['recipientId' => $recipientId, 'users' => $users]);
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
        ->get()
        ->groupBy('sender_id'); // Group messages by sender_id

    // Mark the latest message from each sender as read
    foreach ($receivedMessages as $senderId => $messagesFromSender) {
        $latestMessage = $messagesFromSender->first();
        $latestMessage->markAsReadForUser(Auth::id());
    }

    return view('messages.index', compact('receivedMessages'));
}

    public function sent()
    {
        $sentMessages = Message::where('sender_id', Auth::id())
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('messages.sent', compact('sentMessages'));
    }

    public function show(Message $message)
    {
        if ($message->sender_id !== Auth::id() && $message->recipient_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        // Mark the specific viewed message as read if the current user is the recipient
        $message->markAsReadForUser(Auth::id());

        return view('messages.show', compact('message'));
    }

    public function destroy(Message $message)
{
    // Ensure the user has permission to delete this message (e.g., recipient)
    if ($message->recipient_id !== Auth::id()) {
        abort(403, 'Unauthorized to delete this message.');
    }

    $message->delete();

    return redirect()->route('messages.index')->with('success', 'Message deleted successfully!');
}

public function conversation(int $senderId)
{
    $messages = Message::where('recipient_id', Auth::id())
        ->where('sender_id', $senderId)
        ->orWhere(function ($query) use ($senderId) {
            $query->where('sender_id', Auth::id())
                  ->where('recipient_id', $senderId);
        })
        ->orderBy('created_at', 'desc')
        ->get();

    // Mark all messages in the conversation as read for the current user
    foreach ($messages as $message) {
        $message->markAsReadForUser(Auth::id());
    }

    return view('messages.conversation', compact('messages', 'senderId'));
}

public function destroyConversation(int $senderId)
{
    Message::where('recipient_id', Auth::id())
        ->where('sender_id', $senderId)
        ->delete();

    Message::where('sender_id', Auth::id())
        ->where('recipient_id', $senderId)
        ->delete();

    return redirect()->route('messages.index')->with('success', 'Conversation with User ' . $senderId . ' deleted successfully!');
}

}