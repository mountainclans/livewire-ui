# Set of UI components for Livewire 3

## Установка

Установите пакет при помощи Composer:

```bash
composer require mountainclans/livewire-ui
```

Опционально, вы можете опубликовать `views` для их переопределения:

```bash
php artisan vendor:publish --tag="livewire-ui-views"
```

## Использование

### Input
**Компонент может использоваться в `<translatable>`.**

```bladehtml
<x-ui.input wire:model="firstName"
            name="firstName"
            id="firstName"
            :label="__('First name')"
            :placeholder="__('Enter your name')"
            :prefix="__('mr.')"
            offset-class="mb-4"
/>
```
Атрибут `type` может принимать любые варианты, доступные для обычного html-инпута. Опционально, вы можете передать `type="textarea"` для того, чтобы вместо input`а рендерился тег textarea.

Атрибут `offset-class` задаёт класс для обёртки компонента.

Если вы не передадите `name` или `id`, они будут автоматически сгенерированы на основе `wire:model`. 

Также атрибуты `prefix`, `placeholder`, `offset-class` опциональны.

Рендер ошибок выполняется автоматически.

## Авторы

- [Vladimir Bajenov](https://github.com/mountainclans)
- [Themesberg Flowbite](https://github.com/themesberg/flowbite) - этот пакет использует вёрстку базовых компонентов из Flowbite
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
