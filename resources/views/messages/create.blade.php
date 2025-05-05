@extends('layouts.app')

@section('content')
    <h1>Send New Message</h1>

    <p>Recipient ID from URL: {{ $recipientId ?? 'Not set' }}</p>

    <form action="{{ route('messages.send') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="recipient_id" class="form-label">Recipient User ID:</label>
            <input type="text" class="form-control" id="recipient_id" name="recipient_id"
                   value="{{ $recipientId ?? '' }}" {{ isset($recipientId) ? 'readonly' : '' }} required>
            @error('recipient_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if (isset($recipientId))
                <small class="form-text text-muted">Replying to User ID: {{ $recipientId }}</small>
            @endif
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            @error('message')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
        <a href="{{ route('messages.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
@endsection