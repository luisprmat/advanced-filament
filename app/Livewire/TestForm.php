<?php

namespace App\Livewire;

use App\Components\TextInput;
use Livewire\Component;

class TestForm extends Component
{
    public $email;

    public function render()
    {
        $input = TextInput::make('email')
            ->label(fn ($random, $foo, $state) => $state)
            ->livewire($this);

        return view('livewire.test-form', [
            'input' => $input,
        ]);
    }
}
