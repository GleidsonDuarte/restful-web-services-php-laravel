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

$this->post('auth', 'Auth\AuthenticateController@authenticate');
$this->post('auth-refresh', 'Auth\AuthenticateController@refreshToken');

$this->group(['middleware' => 'jwt.auth'], function() {
	$this->get('products/search', 'API\ProductController@search');
	$this->resource('products', 'API\ProductController', ['except' => ['create', 'edit']]);
});