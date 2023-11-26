<?php

namespace Luisprmat\FilamentToolkit\Tables\Filters;

use Closure;
use DateTimeInterface;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class DateRangeFilter extends Filter
{
    protected string|DateTimeInterface|Closure|null $maxDate = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->form(fn () => [
                Fieldset::make($this->getLabel())
                    ->schema([
                        DatePicker::make('from')
                            ->native(false)
                            ->maxDate($this->getMaxDate()),
                        DatePicker::make('to')
                            ->native(false)
                            ->maxDate($this->getMaxDate()),
                    ])
                    ->columns(1),
            ])
            ->query(function (Builder $query, array $data) {
                return $query
                    ->when(
                        $data['from'] ?? null,
                        fn (Builder $query) => $query->whereDate($this->getName(), '>=', $data['from'])
                    )
                    ->when(
                        $data['to'] ?? null,
                        fn (Builder $query) => $query->whereDate($this->getName(), '<=', $data['to'])
                    );
            })
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
            });
    }

    public function maxDate(string|DateTimeInterface|Closure $date = null): static
    {
        $this->maxDate = $date;

        return $this;
    }

    public function getMaxDate(): string|DateTimeInterface|null
    {
        return $this->evaluate($this->maxDate);
    }
}
