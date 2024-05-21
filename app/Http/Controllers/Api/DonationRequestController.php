<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationRequestController extends Controller
{

    public function index()
    {
        $donationRequests = DonationRequest::all();
        return ApiResponse::sendResponse(200, 'Donation requests retrieved successfully', $donationRequests);
    }

    public function show($id)
    {
        $donationRequest = DonationRequest::find($id);
        if (!$donationRequest) {
            return ApiResponse::sendResponse(404, 'Donation request not found');
        }
        return ApiResponse::sendResponse(200, 'Donation request retrieved successfully', $donationRequest);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Validation Error', $validator->errors());
        }

        $donation = $request->user()->donationRequests()->create($request->all());

        $clients = Client::whereHas('governorates', function ($query)  use ($donation) {
            $query->where('governorate_id', $donation->city->governorate_id);
        })->whereHas('bloodTypes', function ($query) use ($donation) {
            $query->where('blood_type_id', $donation->blood_type_id);
        })->pluck('id')->toArray();

        $tokens = Token::whereHas('client', function ($query) use ($donation) {
                $query->whereHas('governorates', function ($query)  use ($donation) {
                    $query->where('governorate_id', $donation->city->governorate_id);
                })->whereHas('bloodTypes', function ($query) use ($donation) {
                    $query->where('blood_type_id', $donation->blood_type_id);
                });
            })->pluck('fcm_token')->whreNotNull('fcm_token')->toArray();


        return ApiResponse::sendResponse(201, 'Donation request created successfully', $donation);
    }
}
