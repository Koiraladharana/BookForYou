@extends('admin_homepage.admin_layout')
@section('content')
    <div class="container">
        <h1 class="mb-4" style="color: #343a40;"><i class="fas fa-tachometer-alt me-2"></i>Welcome to Admin Panel</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-book fa-2x text-primary mb-2"></i><br>Total Books</h5>
                        <p class="card-text display-4 text-primary">{{ $totalBooks }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-users fa-2x text-success mb-2"></i><br>Total Users</h5>
                        <p class="card-text display-4 text-success">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-user-shield fa-2x text-warning mb-2"></i><br>Total Admins</h5>
                        <p class="card-text display-4 text-warning">{{ $totalAdmins }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 g-4">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="fas fa-exclamation-triangle fa-2x text-danger mb-2"></i><br>Total Fraud Reports</h5>
                        <p class="card-text display-4 text-danger">{{ $totalFrauds }}</p>
                    </div>
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

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #555;
    }

    .card-text {
        font-weight: bold;
    }
</style>