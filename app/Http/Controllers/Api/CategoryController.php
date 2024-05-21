<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $categoryNames = $categories->pluck('name', 'id');
        return ApiResponse::sendResponse(200, 'Categories retrieved successfully', [
            'categories' => $categoryNames
        ]);
    }
}
