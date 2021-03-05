<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SMPController;
use App\Http\Controllers\ProductController;


Route::get('/login', [LoginController::class, 'login'])->name("Login.login");
Route::post('/login', [LoginController::class, 'verify'])->name("Login.verify");

Route::get('/registration', [RegistrationController::class, 'registration'])->name("Registration.registration");
Route::post('/registration', [RegistrationController::class, 'store']);

Route::group(['prefix' => 'system/sales'], function(){

    Route::get('/physical_store', [SMPController::class, 'physical_store']);
        
    Route::get('/social_media', [SMPController::class, 'social_media']);
        
    Route::get('/ecommerce', [SMPController::class, 'ecommerce']);
        
});

Route::group(['prefix' => 'system/product_management'], function(){

    Route::get('/existing_products', [ProductController::class, 'product_list']);
        
    Route::get('/upcoming_products', [ProductController::class, 'upcoming_products']);
        
    Route::get('/add_product', [ProductController::class, 'add_product']);
        
});

Route::get('/system/product_management/existing_products/edit/{id}', [ProductControllerr::class, 'edit']);
Route::post('/system/product_management/existing_products/edit/{id}', [ProductController::class, 'update']);

Route::get('/system/product_management/existing_products/delete/{id}', [ProductController::class, 'delete']);
Route::post('/system/product_management/existing_products/delete/{id}', [ProductController::class, 'destroy']);

Route::get('/system/product_management/product/{product_id}/vendor_details/{vendor_id}', [ProductController::class, 'details']);
