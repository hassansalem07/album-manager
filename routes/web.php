<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PictureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AlbumController::class , 'index']);
Route::resource('albums', AlbumController::class);
Route::post('albums-delete/{album}',[AlbumController::class , 'deleteWithPictures'])->name('deleteWithPictures');
Route::post('albums-move/{album}',[AlbumController::class , 'deleteWithMove'])->name('deleteWithMove');
Route::get('pictures/{album}',[PictureController::class , 'index'])->name('albumPictures');
Route::post('pictures',[PictureController::class , 'store'])->name('storePictures');
Route::get('pictures/delete/{picture}',[PictureController::class , 'destroy'])->name('deletePictures');
