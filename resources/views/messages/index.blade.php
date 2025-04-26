@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Received Messages') }}</div>

                <div class="card-body">
                    @if ($receivedMessages->isEmpty())
                        <p>{{ __('You have no received messages.') }}</p>
                    @else
                        <ul class="list-group">
                            @foreach ($receivedMessages as $message)
                                <li class="list-group-item">
                                    <strong>{{ __('From User ID:') }} {{ $message->sender_id }}</strong>
                                    <small class="text-muted float-end">{{ $message->created_at->diffForHumans() }}</small>
                                    <p>{{ Str::limit($message->body, 50) }}</p>
                                    <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-outline-primary">{{ __('View Message') }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-3">
                            {{ $receivedMessages->links() }}
                        </div>
                    @endif
                    <div class="mt-3">
                        <a href="{{ route('messages.sent') }}" class="btn btn-outline-secondary">{{ __('View Sent Messages') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection