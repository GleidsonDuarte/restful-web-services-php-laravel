<?php
/*
use Illuminate\Http\Request;

|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

$this->post('products/search', 'API\ProductController@search');
$this->resource('products', 'API\ProductController', ['except' => ['create', 'edit']]);