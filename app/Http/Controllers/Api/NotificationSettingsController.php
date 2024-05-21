<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NotificationSettings;
use App\Models\NottificationSeetings;

use function PHPUnit\Framework\returnSelf;

class NotificationSettingsController extends Controller
{

    public function update(Request $request)
    {
        $user = $request->user();
        $bloodTypes = $request->input('blood_types', []);
        $governorates = $request->input('governorates', []);

        $user->bloodTypesSettings()->sync($bloodTypes);
        $user->governorates()->sync($governorates);

        return ApiResponse::sendResponse(200, 'Settings updated successfully');
    }
}
