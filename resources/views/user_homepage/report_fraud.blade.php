@extends('layouts.app')

@section('content')
<div class="container">
    <h2>🚨 Report Fraud</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/report-fraud') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fraud_user_id" class="form-label">Fraud User ID:</label>
            <input type="number" name="fraud_user_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Describe the Issue:</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-danger">Submit Report</button>
    </form>
</div>
@endsection
