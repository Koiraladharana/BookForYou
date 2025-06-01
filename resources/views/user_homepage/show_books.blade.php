@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg rounded-lg">
        <div class="row g-0">
            <div class="col-md-4 text-center bg-light p-4 rounded-start">
                <img src="{{ asset('storage/' . $book->photo) }}" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;" alt="Book Image">
            </div>
            <div class="col-md-8">
                <div class="card-body p-4">
                    <h2 class="card-title mb-4 text-primary">{{ $book->name }}</h2>
                    <p class="card-text"><i class="fas fa-user text-secondary me-2"></i> <strong>User ID:</strong> {{ $book->user_id }}</p>
                    <p class="card-text"><i class="fas fa-book text-secondary me-2"></i> <strong>Book Name:</strong> {{ $book->name }}</p>

                    @if(strtolower($book->category) === 'exchange')
                        <p class="card-text"><i class="fas fa-exchange-alt text-warning me-2"></i> <strong>Book I Want:</strong> {{ $book->want_book ?? 'Not specified' }}</p>
                    @endif

                    <p class="card-text"><i class="fas fa-pen-nib text-info me-2"></i> <strong>Author:</strong> {{ $book->author ?? 'Unknown' }}</p>
                    <p class="card-text"><i class="fas fa-tag text-success me-2"></i> <strong>Category:</strong> {{ $book->category }}</p>
                    <p class="card-text"><i class="fas fa-barcode text-muted me-2"></i> <strong>ISBN:</strong> {{ $book->isbn }}</p>
                    <p class="card-text"><i class="fas fa-building text-secondary me-2"></i> <strong>Publication:</strong> {{ $book->publication }}</p>
                    <p class="card-text"><i class="fas fa-map-marker-alt text-danger me-2"></i> <strong>Location:</strong> {{ $book->location }}</p>
                    <p class="card-text"><i class="fas fa-money-bill-wave text-success me-2"></i> <strong>Price:</strong> RS.{{ $book->price }}</p>

                    <p class="card-text">
                        <i class="fas fa-check-circle {{ $book->status == 'Available' ? 'text-success' : 'text-danger' }} me-2"></i>
                        <strong>Status:</strong>
                        <span class="badge {{ $book->status == 'Available' ? 'bg-success' : 'bg-danger' }} p-2 rounded">
                            {{ $book->status }}
                        </span>
                    </p>

                    <p class="card-text"><i class="fas fa-envelope text-primary me-2"></i> <strong>Email:</strong> {{ $book->email }}</p>

                    @if($book->phone)
                        <p class="card-text"><i class="fas fa-phone text-success me-2"></i> <strong>Phone:</strong> {{ $book->phone }}</p>
                    @endif

                    <a href="{{ route('messages.create', ['recipientId' => $book->user_id, 'bookId' => $book->id]) }}" class="btn btn-primary rounded-pill me-2"><i class="fas fa-envelope me-2"></i> Send Message</a>
                    <a href="{{ route('userdas', $book->id) }}" class="btn btn-outline-primary rounded-pill"><i class="fas fa-arrow-left me-2"></i> Back to My Books</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: 1px solid #ddd;
    }

    .card-title {
        font-size: 2.2em;
        font-weight: bold;
    }

    .card-text {
        font-size: 1.1em;
        margin-bottom: 0.75rem;
    }

    .rounded-start {
        border-top-left-radius: 0.5rem !important;
        border-bottom-left-radius: 0.5rem !important;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }
</style>
@endsection