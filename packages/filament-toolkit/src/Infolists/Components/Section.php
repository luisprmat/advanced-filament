<?php

namespace Luisprmat\FilamentToolkit\Infolists\Components;

use Filament\Infolists\Components\Component;
use Luisprmat\FilamentToolkit\Concerns\CanBeSection;

class Section extends Component
{
    use CanBeSection;

    protected string $view = 'filament-toolkit::section';
}
