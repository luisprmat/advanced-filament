<?php

use App\Components\TextInput;
use Illuminate\Support\Facades\Route;

Route::get('/demo', function () {
    $input = TextInput::make('email')
        ->label('Email Address');

    return view('demo', [
        'input' => $input,
    ]);
});
