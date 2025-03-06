@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <!-- Ensure Image Fits Properly -->
                <img src="{{ asset('storage/' . $book->photo) }}" class="img-fluid rounded" style="max-width: 100%; height: auto;" alt="Book Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    
                    <p><strong>User ID:</strong> {{ $book->user_id }}</p>
                    <p><strong>Book name:</strong> {{ $book->name }}</p>
                    
                    @if(strtolower($book->category) === 'exchange')
                        <p><strong>Book I Want:</strong> {{ $book->want_book ?? 'Not specified' }}</p>
                    @endif
                    
                    <p><strong>Author:</strong> {{ $book->author ?? 'Unknown' }}</p>
                    <p><strong>Category:</strong> {{ $book->category }}</p>
                    <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                    <p><strong>Publication:</strong> {{ $book->publication }}</p>
                    <p><strong>Location:</strong> {{ $book->location }}</p>
                    <p><strong>Price:</strong> RS.{{ $book->price }}</p>

                    <!-- Status with Color -->
                    <p><strong>Status:</strong> 
                        <span class="badge {{ $book->status == 'Available' ? 'bg-success' : 'bg-danger' }} p-2 rounded">
                            {{ $book->status }}
                        </span>
                    </p>
                    

                    <p><strong>Email:</strong> {{ $book->email }}</p>
                    
                    @if($book->phone)
                        <p><strong>Phone:</strong> {{ $book->phone }}</p>
                    @endif

                    <a href="{{ route('userdas', $book->id) }}" class="btn btn-primary">Back to My Books</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
