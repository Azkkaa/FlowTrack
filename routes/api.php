<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('transaction-type/{type}', function ($type) {
    try{
        $categoriesType =  Category::where('type', '=', $type)->get();

        return response()->json([
            'categories' => $categoriesType->makeHidden(['created_at', ])
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => $e->getMessage()
        ], 500);
    }
});
