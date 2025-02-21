@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        
        <div class="row g-0">
            <div class="col-md-4">
        
                <img src="{{ asset('storage/' . $book->photo) }}" width="150px" alt="Book Image">
                
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3>{{ $book->book_name }}</h3>
                
                    <p>Book Name: {{$book->name }}</p>
                    @if($book->author)
                    <p>Author Name: {{$book->author }}</p>
                    @endif
                    <p>Location: {{ $book->location }}</p>
                    <p>Price: {{ $book->price }}</p>
                    <p>Email: {{ $book->email }}</p>
                    @if($book->phone)
                        <p>Phone: {{ $book->phone }}</p>
                    @endif
                    <a href="{{ route('books.view', $book->id) }}" class="btn btn-primary">Back to My Books</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
