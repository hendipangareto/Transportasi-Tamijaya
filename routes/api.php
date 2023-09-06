<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/master-data/pick-point/get-pick-by-destination/{code}', 'Admin\MasterData\PickPointController@getPickByDestination');
Route::get('/master-data/bus/{id}', 'Admin\MasterData\BusController@getDetailBus');
Route::post('/management-customer/create-inbox', 'Admin\ManagementCustomer\InboxController@createInboxCustomer');
