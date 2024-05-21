<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::first();
        return ApiResponse::sendResponse(200, 'Settings retrieved successfully', [
            'settings' => $settings
        ]);
    }

}
