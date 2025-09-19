<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\FileUploadController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(LoginController::class)->group(function(){
    #Route::post('register', 'register'); # Don't allow registering users via the api. Just login
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::get('fileuploads', [FileUploadController::class, 'index']);
    Route::get('fileupload/{id}', [FileUploadController::class, 'show']);
    Route::post('insert-fileupload', [FileUploadController::class, 'store']);
});
