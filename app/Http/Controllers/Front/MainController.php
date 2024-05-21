<?php

namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\BloodType;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    
    public function home(Request $request)
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
            ->paginate(4);

        return view('Front.home', compact( 'donationRequests'));
    }

    public function postDetails($id)
    {
        $post = Post::findOrFail($id);

        return view('Front.Posts.postDetails', ['post' => $post]);
    }

    public function aboutUS()
    {
        return view('Front.aboutUs');
    }

    public function contactUs()
    {
        return view('Front.contactUs');
    }



}
