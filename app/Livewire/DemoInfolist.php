<?php

namespace App\Livewire;

use App\Infolists\Components\ColorEntry;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DemoInfolist extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                ColorEntry::make('color')
                    ->width(fn (string $state): int => match ($state) {
                        '#ff0000' => 4,
                        '#0000ff' => 5
                    }),
            ])
            ->state([
                'color' => ['#ff0000', '#0000ff'],
            ]);
    }

    public function render(): View
    {
        return view('livewire.demo-infolist');
    }
}
