<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function profile(Request $request)
    {
        $client = $request->user();
        $data = $request->only([
            'name', 'phone', 'email', 'd_o_b', 'city_id', 'blood_type_id', 'pin_code', 'last_donation_rate', 'password'
        ]);
        $rules = [
            'name' => 'string|max:255',
            'phone' => 'string|max:20|unique:clients,phone,' . $client->id,
            'email' => 'unique:clients,email,' . $client->id . '|string|email|max:255',
            'd_o_b' => 'date',
            'city_id' => 'exists:cities,id',
            'blood_type_id' => 'exists:blood_types,id',
            'pin_code' => 'string|max:10',
            'last_donation_rate' => 'date',
            'password' => 'confirmed'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Validation Error', $validator->errors());
        }

        if ($request->has('password')) {
            $data['password'] = bcrypt($data['password']);
        }

        $client->update($data);

        return ApiResponse::sendResponse(200, 'Profile updated successfully', $client);
    }
}
