<?php

use Illuminate\Support\Facades\Blade;
use MountainClans\LivewireUi\LivewireUiServiceProvider;

it('boots the service provider', function () {
    expect(app()->getLoadedProviders())
        ->toHaveKey(LivewireUiServiceProvider::class);
});

it('renders the x-ui.input component', function () {
    $html = Blade::render('<x-ui.input label="Email" name="email" />');

    expect($html)
        ->toContain('Email')
        ->toContain('<input')
        ->toContain('name="email"');
});

it('renders the x-ui.submit-button component', function () {
    $html = Blade::render('<x-ui.submit-button />');

    expect($html)->toContain('<button');
});
