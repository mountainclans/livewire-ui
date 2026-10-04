<?php

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Livewire\Livewire;
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

test('поиск в мультиселекте выключен по умолчанию', function () {
    Livewire::test(new class () extends Component {
        public array $tags = [];

        public function render(): string
        {
            return '<div><x-ui.multiselect wire:model="tags" label="Метки" :values="[\'frozen\' => \'Заморозка\', \'spicy\' => \'Острое\']" /></div>';
        }
    })
        ->assertSee('Заморозка')
        ->assertDontSeeHtml('x-ref="search"');
});

test('включённый поиск выводит поле, текст пустого результата и не попадает в атрибуты флажков', function () {
    Livewire::test(new class () extends Component {
        public array $tags = [];

        public function render(): string
        {
            return '<div><x-ui.multiselect wire:model="tags" label="Метки" searchable search-placeholder="Найти метку" no-results="Меток нет" :values="[\'frozen\' => \'Заморозка\']" /></div>';
        }
    })
        ->assertSeeHtml('x-ref="search"')
        ->assertSeeHtml('placeholder="Найти метку"')
        ->assertSee('Меток нет')
        ->assertDontSeeHtml('searchable=');
});
