@extends('layouts.app')

@section('content')
    <h1>Received Messages</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($receivedMessages->isEmpty())
        <p>No messages received.</p>
    @else
        <ul class="list-unstyled">
            @foreach ($receivedMessages as $senderId => $messagesFromSender)
                @php
                    $latestMessage = $messagesFromSender->first();
                    $unreadCount = $messagesFromSender->where('read_at', null)->count();
                @endphp
                <li class="d-flex justify-content-between align-items-center p-3 mb-2 bg-light rounded">
                    <div>
                        <i class="fas fa-user-circle me-2"></i> User ID: {{ $senderId }}<br>
                        <small class="text-muted"><i class="far fa-clock me-1"></i> {{ $latestMessage->created_at->diffForHumans() }}</small>
                        <p class="mt-1">
                            @if ($messagesFromSender->count() > 1)
                                <a href="{{ route('messages.conversation', $senderId) }}">
                                    {{ Str::limit($latestMessage->body, 80) }} ({{ $messagesFromSender->count() }} messages)
                                </a>
                            @else
                                <a href="{{ route('messages.show', $latestMessage->id) }}">
                                    {{ Str::limit($latestMessage->body, 80) }}
                                </a>
                            @endif
                        </p>
                        @if ($unreadCount > 0)
                            <span class="badge bg-warning">{{ $unreadCount }} Unread</span>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('messages.conversation', $senderId) }}" class="btn btn-sm btn-outline-primary me-2" title="View Conversation"><i class="far fa-envelope-open"></i></a>
                        <form action="{{ route('messages.destroy-conversation', $senderId) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger ms-2" title="Delete Conversation" onclick="return confirm('Are you sure you want to delete all messages from this user?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection