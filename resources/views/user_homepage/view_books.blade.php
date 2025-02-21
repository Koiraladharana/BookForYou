@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>My Books</h2>
    
    @if ($books->isEmpty())
        <p>No books added yet.</p>
    @else
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="{{ route('books.show', $book->id) }}">
                            <img src="{{ asset('storage/' . $book->photo) }}" class="card-img-top" alt="Book Photo" style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->name }}</h5>
                            <p class="card-text">
                                <strong>Status:</strong>
                                <span class="badge {{ $book->status == 'available' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($book->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
