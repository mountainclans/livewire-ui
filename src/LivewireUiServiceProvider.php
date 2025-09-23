<?php

namespace MountainClans\LivewireUi;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LivewireUiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-ui')
            ->hasViews();
    }

    public function packageBooted(): void
    {
        Blade::component('livewire-ui::components/confirm-delete', 'ui.confirm-delete');
        Blade::component('livewire-ui::components/form', 'ui.form');
        Blade::component('livewire-ui::components/form-tabs', 'ui.form-tabs');
        Blade::component('livewire-ui::components/input', 'ui.input');
        Blade::component('livewire-ui::components/modal', 'ui.modal');
        Blade::component('livewire-ui::components/multiselect', 'ui.multiselect');
        Blade::component('livewire-ui::components/radio', 'ui.radio');
        Blade::component('livewire-ui::components/submit-button', 'ui.submit-button');
        Blade::component('livewire-ui::components/toggle', 'ui.toggle');
    }
}
