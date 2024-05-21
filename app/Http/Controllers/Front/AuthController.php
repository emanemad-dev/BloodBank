<?php

namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Models\Client;
use App\Models\BloodType;
use App\Models\Governorate;
use Illuminate\Support\Str;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('Front.Auth.register');
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:clients,email',
            'd_o_b' => 'required|date',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
            'pin_code' => 'nullable|numeric',
            'last_donation_rate' => 'nullable|date',
        ]);

        $client = Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'd_o_b' => $request->d_o_b,
            'city_id' => $request->city_id,
            'blood_type_id' => $request->blood_type_id,
            'last_donation_rate' => $request->last_donation_rate,

        ]);
        Auth::login($client);
        return view('Front.home');
    }

    public function loginForm()
    {
        return view('Front.Auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $client = Client::where('email', $request->email)->first();

        if ($client && Hash::check($request->password, $client->password)) {
            Auth::login($client);
            return redirect()->route('home');
        }
        return back()->withErrors(['email' => 'خطأ في البريد الإلكتروني أو كلمة المرور.']);


    }
    public function  logout()
    {
        return view('Front.Auth.login');
    }
}
