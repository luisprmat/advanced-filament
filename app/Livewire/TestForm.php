<?php

namespace App\Livewire;

use App\Components\TextInput;
use Livewire\Component;

class TestForm extends Component
{
    public $email;

    public function render()
    {
        TextInput::configureUsing(function ($input) {
            $input->maxLength(7);
        });

        TextInput::macro('foo', fn () => dd('bar'));

        $nameInput = TextInput::make('name')
            ->foo()
            ->livewire($this);

        $emailInput = TextInput::make('email')
            ->foo()
            ->livewire($this);

        return view('livewire.test-form', [
            'nameInput' => $nameInput,
            'emailInput' => $emailInput,
        ]);
    }
}
