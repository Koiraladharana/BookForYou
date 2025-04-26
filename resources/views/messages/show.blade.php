@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Message Details') }}</div>

                <div class="card-body">
                    <p><strong>{{ __('From User ID:') }}</strong> {{ $message->sender_id }}</p>
                    <p><strong>{{ __('To User ID:') }}</strong> {{ $message->recipient_id }}</p>
                    <p><strong>{{ __('Sent At:') }}</strong> {{ $message->created_at->format('Y-m-d H:i:s') }} ({{ $message->created_at->diffForHumans() }})</p>
                    <hr>
                    <p>{{ $message->body }}</p>
                    <hr class="mt-4">
                    <h5>{{ __('Reply to this Message') }}</h5>
                    <form method="POST" action="{{ route('messages.send') }}">
                        @csrf
                        <input type="hidden" name="recipient_id" value="{{ $message->sender_id }}">

                        <div class="mb-3">
                            <label for="message" class="form-label">{{ __('Your Reply:') }}</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">{{ __('Send Reply') }}</button>
                        </div>
                    </form>

                    <div class="mt-3">
                        <a href="{{ route('messages.index') }}" class="btn btn-secondary">{{ __('Back to Received Messages') }}</a>
                        <a href="{{ route('messages.sent') }}" class="btn btn-outline-secondary">{{ __('Back to Sent Messages') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection