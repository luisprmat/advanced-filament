<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
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
                    ->maxDate(now()->addMonth())
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['from'] ?? null) {
                            $indicators[] = Indicator::make('Email verified from '.Carbon::parse($data['from'])->toFormattedDateString())
                                ->removeField('from');
                        }

                        if ($data['to'] ?? null) {
                            $indicators[] = Indicator::make('Email verified to '.Carbon::parse($data['to'])->toFormattedDateString())
                                ->removeField('to');
                        }

                        return $indicators;
                    }),
            ]);
    }

    public function render(): View
    {
        return view('livewire.demo-table');
    }
}
