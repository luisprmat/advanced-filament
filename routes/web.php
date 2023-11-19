<?php

use App\Livewire\DemoForm;
use App\Livewire\TestForm;
use Illuminate\Support\Facades\Route;

Route::get('/demo', TestForm::class);
Route::get('/demo-form', DemoForm::class);
