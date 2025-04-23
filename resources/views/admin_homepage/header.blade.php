@extends('admin_homepage.admin_layout')
@section('content')
    <div class="container">
        <h1>Welcome to Admin Panel</h1>
        <div class="stats">
            <div class="stat-box">
                <h3>Total Books</h3>
                <p>{{ $totalBooks }}</p>
            </div>
            <div class="stat-box">
                <h3>Total Users</h3>
                <p>{{ $totalUsers }}</p>
            </div>
            <div class="stat-box">
                <h3>Total Admins</h3>
                <p>{{ $totalAdmins }}</p>
            </div>
			<div class="stat-box">
                <h3>Total Fraud Reports</h3>
                <p>{{ $totalFrauds }}</p>
            </div>
        </div>
    </div>
@endsection
