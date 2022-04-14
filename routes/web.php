<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire as lw;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/code',lw\Code\Index::class)->name('code.index');
