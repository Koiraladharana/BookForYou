@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Send New Message') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('messages.send') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="recipient_id" class="form-label">{{ __('Recipient User ID:') }}</label>
                            <input type="number" class="form-control @error('recipient_id') is-invalid @enderror" id="recipient_id" name="recipient_id" value="{{ $recipientId ?? old('recipient_id') }}" required>
                            @error('recipient_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted">{{ __('Enter the ID of the user you want to send a message to. You can find the User ID on their book listing.') }}</small>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">{{ __('Message:') }}</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">{{ __('Send Message') }}</button>
                            <a href="{{ route('messages.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection