<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\DonationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationRequestController extends Controller
{
    public function index()
    {
        $records = DonationRequest::with(['city' ,'bloodType'])->get();
        return view('Dashboard.Donation.index', compact('records'));
    }


    public function create()
    {
        return view('Dashboard.Donation.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
            'city_id' => 'required|exists:cities,id',
            'hospital_name' => 'required|string|max:255',
            'blood_type_id' => 'required|exists:blood_types,id',
            'age' => 'required|integer',
            'bags_num' => 'required|integer',
            'details' => 'nullable|string',
            'hospital_address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        DonationRequest::create($validatedData);
        return redirect('donation-requests')->with('success', 'Donation request created successfully.');
    }

    public function edit($id)
    {
        $record = DonationRequest::findOrFail($id);
        return view('Dashboard.Donation.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
            'city_id' => 'required|exists:cities,id',
            'hospital_name' => 'required|string|max:255',
            'blood_type_id' => 'required|exists:blood_types,id',
            'age' => 'required|integer',
            'bags_num' => 'required|integer',
            'details' => 'nullable|string',
            'hospital_address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $donationRequest = DonationRequest::findOrFail($id);
        $donationRequest->update($validatedData);
        return redirect('donation-requests')->with('success', 'Donation request updated successfully.');
    }

    public function destroy($id)
    {
        $donationRequest = DonationRequest::findOrFail($id);
        $donationRequest->delete();
        return redirect('donation-requests')->with('success', 'Donation request deleted successfully.');
    }
}
