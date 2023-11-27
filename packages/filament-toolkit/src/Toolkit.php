<?php

namespace Luisprmat\FilamentToolkit;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Luisprmat\FilamentToolkit\Resources\UserResource;

class Toolkit implements Plugin
{
    protected bool $hasEmailVerifiedAt = false;

    public static function make(): Toolkit
    {
        return new Toolkit();
    }

    public function emailVerifiedAt(bool $condition): static
    {
        $this->hasEmailVerifiedAt = $condition;

        return $this;
    }

    public function hasEmailVerifiedAt(): bool
    {
        return $this->hasEmailVerifiedAt;
    }

    public function getId(): string
    {
        return 'luisprmat-toolkit';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                UserResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
