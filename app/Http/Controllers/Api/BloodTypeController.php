<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\BloodType;
use Illuminate\Http\Request;


class BloodTypeController extends Controller
{
    public function index()
    {
        $bloodTypes = BloodType::all();
        $bloodTypeNames = $bloodTypes->pluck('name','id');
        return ApiResponse::sendResponse(200, 'Blood types retrieved successfully', [
            'blood_types' => $bloodTypeNames
        ]);
    }

}
