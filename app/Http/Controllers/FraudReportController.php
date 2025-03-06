<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FraudReport;
use Illuminate\Support\Facades\Auth;

class FraudReportController extends Controller
{
    // Show the Report Fraud form
    public function create()
    {
        return view('user_homepage.report_fraud');
    }

    // Store the fraud report
    public function store(Request $request)
    {
        $request->validate([
            'fraud_user_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000'
        ]);

        FraudReport::create([
            'user_id' => Auth::id(), // Who is reporting
            'fraud_user_id' => $request->fraud_user_id, // Fraud user
            'message' => $request->message
        ]);

        return redirect()->back()->with('success', 'Fraud report submitted successfully.');
    }
}


