<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Luisprmat\FilamentToolkit\Tables\Columns\ColorColumn;
use Luisprmat\FilamentToolkit\Tables\Filters\DateRangeFilter;

class DemoTable extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                Tables\Columns\TextInputColumn::make('name'),
                ColorColumn::make('color'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->since(),
            ])
            ->filters([
                DateRangeFilter::make('email_verified_at')
                    ->maxDate(now()->addMonth()),
            ]);
    }

    public function render(): View
    {
        return view('livewire.demo-table');
    }
}
