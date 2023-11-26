<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Luisprmat\FilamentToolkit\Forms\Components\ColorPicker;
use Luisprmat\FilamentToolkit\Forms\Components\Section;

class DemoForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Colors')
                    ->description('Pick your own color scheme for the app.')
                    ->icon('heroicon-o-swatch')
                    ->schema([
                        ColorPicker::make('primary')
                            ->default('#fbbf24')
                            ->width(100),
                        ColorPicker::make('secondary')
                            ->default('#c084fc')
                            ->width(100),
                        ColorPicker::make('success')
                            ->default('#84cc16')
                            ->width(100),
                        ColorPicker::make('warning')
                            ->default('#facc15')
                            ->width(100),
                        ColorPicker::make('danger')
                            ->default('#ef4444')
                            ->width(100),
                        ColorPicker::make('gray')
                            ->default('#a1a1aa')
                            ->width(100),
                    ])
                    ->columns(3),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        //
    }

    public function render(): View
    {
        return view('livewire.demo-form');
    }
}
