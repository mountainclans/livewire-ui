<?php

namespace MountainClans\LivewireUi\Tests;

use Illuminate\Support\ViewErrorBag;
use Livewire\LivewireServiceProvider;
use MountainClans\LivewireUi\LivewireUiServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        // Вне HTTP-запроса middleware ShareErrorsFromSession не отрабатывает,
        // а компоненты используют @error — расшариваем пустой bag вручную.
        $this->app['view']->share('errors', new ViewErrorBag);
    }

    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            LivewireUiServiceProvider::class,
        ];
    }
}
