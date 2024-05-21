<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::pluck('name', 'id');
        return ApiResponse::sendResponse(200, 'All Cities retrieved successfully', $cities);
    }

}
