<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 
Route::get('/firstpage', ['uses' =>  'Core\RedirectManager@Page_Redirect','page_name' => 'firstpage','as' => 'firstpage',]); 
Route::get('/firstpage/{par1}', ['uses' =>  'Core\RedirectManager@Page_Redirect_one_par','page_name' => 'firstpage','as' => 'firstpage',]); 
Route::get('/firstpage/{par1}/{par2}', ['uses' =>  'Core\RedirectManager@Page_Redirect_tow_par','page_name' => 'firstpage','as' => 'firstpage',]); 
 
 
Route::get('/main', ['uses' =>  'Core\RedirectManager@Page_Redirect','page_name' => 'main','as' => 'main',]); 


Route::get('/codemanager', ['uses' =>  'Core\RedirectManager@Page_Redirect','page_name' => 'codemanager','as' => 'codemanager',]); 
Route::get('/codemanager/{par1}', ['uses' =>  'Core\RedirectManager@Page_Redirect_one_par','page_name' => 'codemanager','as' => 'codemanager',]); 
Route::get('/codemanager/{par1}/{par2}', ['uses' =>  'Core\RedirectManager@Page_Redirect_tow_par','page_name' => 'codemanager','as' => 'codemanager',]); 
 
Route::get('/gorcery', ['uses' =>  'Core\RedirectManager@Page_Redirect','page_name' => 'gorcery','as' => 'gorcery',]); 
Route::get('/gorcery/{par1}', ['uses' =>  'Core\RedirectManager@Page_Redirect_one_par','page_name' => 'gorcery','as' => 'gorcery',]); 
Route::get('/gorcery/{par1}/{par2}', ['uses' =>  'Core\RedirectManager@Page_Redirect_tow_par','page_name' => 'gorcery','as' => 'gorcery',]); 
 
 
Route::get('/exceltosql', ['uses' =>  'Core\RedirectManager@Page_Redirect','page_name' => 'exceltosql','as' => 'exceltosql',]); 

