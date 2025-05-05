@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Conversation with User ID: {{ $senderId }}</h1>
        <div>
            <a href="{{ route('messages.create', ['recipientId' => $senderId]) }}" class="btn btn-primary me-2">Reply</a>
            <a href="{{ route('messages.index') }}" class="btn btn-secondary">Back to Received Messages</a>
        </div>
    </div>

    <ul class="list-unstyled">
        @if ($messages->isEmpty())
            <p>No messages in this conversation yet.</p>
        @else
            @foreach ($messages as $message)
                <li class="p-3 mb-2 @if ($message->sender_id === Auth::id()) bg-light @else bg-white @endif rounded">
                    <div>
                        <strong>
                            @if ($message->sender_id === Auth::id())
                                You
                            @else
                                User ID: {{ $message->sender_id }}
                            @endif
                        </strong>
                        <small class="text-muted float-end">{{ $message->created_at->diffForHumans() }}</small>
                        <p class="mt-1">{{ $message->body }}</p>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
@endsection