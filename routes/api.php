<?php

use Illuminate\Support\Facades\Route;
use JardinDeVicky\NovaFileManager\Http\Controllers\FileManagerToolController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
 */
Route::get('data', FileManagerToolController::class.'@getData');
Route::get('{resource}/{attribute}/data', FileManagerToolController::class.'@getDataField');
Route::post('actions/move', FileManagerToolController::class.'@move');
Route::post('actions/create-folder', FileManagerToolController::class.'@createFolder');
Route::post('actions/delete-folder', FileManagerToolController::class.'@deleteFolder');
Route::post('actions/get-info', FileManagerToolController::class.'@getInfo');
Route::post('actions/remove-file', FileManagerToolController::class.'@removeFile');
Route::post('actions/rename-file', FileManagerToolController::class.'@renameFile');
Route::get('actions/download-file', FileManagerToolController::class.'@downloadFile');
Route::post('actions/rename', FileManagerToolController::class.'@rename');

Route::post('events/folder', FileManagerToolController::class.'@folderUploadedEvent');

Route::post('uploads/add', FileManagerToolController::class.'@upload');
Route::get('uploads/update', FileManagerToolController::class.'@updateFile');
