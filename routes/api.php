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


Route::post('Main_Ajax', 'Core\AjaxManager@Main_Ajax'); 
Route::post('Main_AjaxRocket', 'Core\AjaxManager@Main_AjaxRocket'); 
Route::post('Main_Render', 'Core\RenderManager@Main_Render'); 

Route::post('ajax_file_upload', 'Core\UploadManager@ajax_file_upload');


 


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
