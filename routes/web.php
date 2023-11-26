<?php

use App\Livewire\DemoForm;
use App\Livewire\DemoInfolist;
use App\Livewire\DemoTable;
use App\Livewire\TestForm;
use Illuminate\Support\Facades\Route;

Route::get('/demo', TestForm::class);
Route::get('/form', DemoForm::class);
Route::get('/infolist', DemoInfolist::class);
Route::get('/table', DemoTable::class);
