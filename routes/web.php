<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('api/messages' , [MessageController::class , 'showMessages'])->name('show');
Route::get('server' , [MessageController::class , 'store']);

Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');


// صفحه فرم ساخت پیام
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');

// ذخیره اطلاعات فرم
Route::post('/messages/store', [MessageController::class, 'storeForm'])->name('messages.store.form');


// صفحه فرم ویرایش پیام
Route::get('/messages/{id}/edit', [MessageController::class, 'edit'])->name('messages.edit');

// ذخیره تغییرات پیام
Route::put('/messages/{id}', [MessageController::class, 'update'])->name('messages.update');
