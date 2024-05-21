<?php

namespace App\Http\Controllers\Api;

use App\Models\Governorate;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GovernorateController extends Controller
{

    public function index()
    {
        $governorates = Governorate::pluck('name', 'id');

        return ApiResponse::sendResponse(200, 'Governorates retrieved successfully', $governorates);
    }

    public function governoratesWithItisCities()
    {
        $governoratesWithCities = Governorate::with(['cities:id,name,governorate_id'])->select('id', 'name')->get();

        return ApiResponse::sendResponse(200, 'Governorates with cities retrieved successfully', [
            'governorates' => $governoratesWithCities
        ]);
    }
}
