<!-- admin_homepage/show_fraud_reports.blade.php --> 
@extends('admin_homepage.admin_layout')

@section('content')
        <h1>All Fraud Reports</h1>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th style="width: 15%;">Reported By</th>
                        <th style="width: 10%;">User ID</th>
                        <th style="width: 15%;">Fraud User ID</th>
                        <th style="width: 40%;">Message</th>
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    @foreach($fraudReports as $report)
                        <tr>
                            <td>{{ $report->user->name }}</td>
                            <td>{{ $report->user_id }}</td>
                            <td>{{ $report->fraud_user_id }}</td>
                            <td>
                                <div class="overflow-auto p-2 bg-white text-dark rounded" style="max-height: 100px; word-wrap: break-word; white-space: normal; border: 1px solid #ddd;">
                                    {{ $report->message }}
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('deleteFraudReport', $report->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   
@endsection


