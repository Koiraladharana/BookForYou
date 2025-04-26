@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sent Messages') }}</div>

                <div class="card-body">
                    @if ($sentMessages->isEmpty())
                        <p>{{ __('You have no sent messages.') }}</p>
                    @else
                        <ul class="list-group">
                            @foreach ($sentMessages as $message)
                                <li class="list-group-item">
                                    <strong>{{ __('To User ID:') }} {{ $message->recipient_id }}</strong>
                                    <small class="text-muted float-end">{{ $message->created_at->diffForHumans() }}</small>
                                    <p>{{ Str::limit($message->body, 50) }}</p>
                                    <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-outline-primary">{{ __('View Message') }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-3">
                            {{ $sentMessages->links() }}
                        </div>
                    @endif
                    <div class="mt-3">
                        <a href="{{ route('messages.index') }}" class="btn btn-outline-secondary">{{ __('View Received Messages') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection