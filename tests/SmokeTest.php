<?php

use Illuminate\Support\Facades\Blade;
use MountainClans\LivewireUi\LivewireUiServiceProvider;

test('сервис-провайдер пакета загружается', function () {
    expect(app()->getLoadedProviders())
        ->toHaveKey(LivewireUiServiceProvider::class);
});

test('компонент x-ui.input выводит подпись и поле', function () {
    $html = Blade::render('<x-ui.input label="Email" name="email" />');

    expect($html)
        ->toContain('Email')
        ->toContain('<input')
        ->toContain('name="email"');
});

test('компонент x-ui.submit-button выводит кнопку', function () {
    $html = Blade::render('<x-ui.submit-button />');

    expect($html)->toContain('<button');
});
