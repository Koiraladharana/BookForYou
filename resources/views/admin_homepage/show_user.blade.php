@extends('admin_homepage.admin_layout')
@section('content')
    <div class="container">
        <h1 class="mb-4" style="color: #343a40;"><i class="fas fa-users me-2"></i> All Users</h1>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th><i class="fas fa-user me-2"></i> Name</th>
                                <th><i class="fas fa-envelope me-2"></i> Email</th>
                                <th><i class="fas fa-tag me-2"></i> Role</th>
                                <th class="text-center"><i class="fas fa-cogs me-2"></i> Action</th>
                                <th class="text-center"><i class="fas fa-book-open me-2"></i> Total Books</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role === 'admin')
                                            <span class="badge bg-primary">{{ ucfirst($user->role) }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($user->role) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('deleteUser', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fas fa-trash-alt me-1"></i> Delete</button>
                                        </form>
                                    </td>
                                    <td class="text-center">{{ $user->books_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .container {
        padding: 30px;
    }

    .card {
        border: none;
        border-radius: 8px;
    }

    .thead-light th {
        background-color: #f8f9fa;
        color: #555;
        border-bottom: 2px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:hover {
        background-color: #e9ecef;
        transition: background-color 0.2s ease;
    }

    tbody td {
        padding: 10px;
        vertical-align: middle;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.2s ease;
        font-size: 0.9rem;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .badge {
        font-size: 0.8rem;
        padding: 0.4em 0.6em;
        border-radius: 0.25rem;
    }

    .text-center {
        text-align: center;
    }
</style>