<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, $validator->errors()->first(), null);
        }
        $client = Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'd_o_b' => $request->d_o_b,
            'city_id' => $request->city_id,
            'blood_type_id' => $request->blood_type_id,
            'pin_code' => $request->pin_code,
            'last_donation_rate' => $request->last_donation_rate,
            'api_token' => Str::random(80),
        ]);
        return ApiResponse::sendResponse(201, 'Client registered successfully', [
            'api_token' => $client->api_token,
            'client' =>  $client
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Validation error', $validator->errors());
        }
        $client = Client::where('email', $request->email)->first();
        if ($client) {
            $client->api_token = Str::random(80);
            $client->save();
            return ApiResponse::sendResponse(200, 'Login successful', [
                'api_token' => $client->api_token,
                'client' =>  $client
            ]);
        } else {

            return ApiResponse::sendResponse(401, 'Invalid credentials', []);
        }
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Validation error', $validator->errors());
        }

        $client = Client::where('email', $request->email)->first();

        if ($client) {
            $pinCode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $client->pin_code = $pinCode;
            $client->save();

            Mail::to($client->email)->bcc('emanemadelkoly@gmail.com')->send(new ResetPassword($client));

            return ApiResponse::sendResponse(200, 'Password reset email sent successfully', [
                'client' => $client
            ]);
        } else {
            return ApiResponse::sendResponse(401, 'Invalid credentials', []);
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password_confirmation' => 'required',
            'pin_code' => 'required|digits:4',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Validation error', $validator->errors());
        }

        $client = Client::where('pin_code', $request->pin_code)->first();

        if (!$client) {
            return ApiResponse::sendResponse(401, 'Invalid credentials', []);
        }

        $client->password = Hash::make($request->password);
        $client->pin_code = null;
        $client->save();

        return ApiResponse::sendResponse(200, 'Password reset successful', [
            'client' => $client
        ]);
    }

    public function registerToken(Request $request){

    }
}
