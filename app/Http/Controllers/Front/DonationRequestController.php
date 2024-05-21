<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationRequestController extends Controller
{
    
    public function index(Request $request)
    {
        $bloodType = $request->input('blood_type');
        $city = $request->input('city');

        $donationRequests = DonationRequest::where(function ($query) use ($bloodType, $city) {
            if ($bloodType) {
                $query->where('blood_type_id', $bloodType);
            }
            if ($city) {
                $query->where('city_id', $city);
            }
        })
            ->paginate(8);

        return view('Front.DonationRequests.index', compact('donationRequests'));
    }

    public function donationDetails($id)
    {
        $donationRequest = DonationRequest::find($id);
        return view('Front.DonationRequests.donation-details', compact('donationRequest'));
    }

}
