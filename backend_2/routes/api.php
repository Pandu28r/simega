<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::get('/testing', function () {
    return response()->json(['message' => 'done']);
});

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/admin', function () {
        return response()->json(['message' => 'Halo Admin!']);
    })->middleware('role:admin|super-admin');

    Route::get('/employee', function (){
        return response()->json(['message' => 'Halo Employee']);
    })->middleware('role:employee|super-admin');
});


Route::fallback(function (Request $request) {
    return response()->json([
        'status' => 404,
        'message' => 'Page tidak ditemukan.',
    ], 404);
});
