<?php

namespace Luisprmat\FilamentToolkit\Forms\Components;

use Filament\Forms\Components\Component;
use Luisprmat\FilamentToolkit\Concerns\CanBeSection;

class Section extends Component
{
    use CanBeSection;

    protected string $view = 'filament-toolkit::section';
}
