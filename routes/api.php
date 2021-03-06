<?php

use Illuminate\Http\Request;
use App\Http\Resources\Products as ProductResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/products', function () {
    return ProductResource::collection(\App\Products::paginate(3));
});
Route::get('/product/{id}', function ($id) {
    return new ProductResource(App\Products::findOrFail($id));
});