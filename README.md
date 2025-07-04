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

### Form
```bladehtml
<x-ui.form wire:submit="login"
           id="login"
           wire:recaptcha
           class="grid sm:grid-cols-2 gap-4 text-sm py-4"
>
Контент формы
</x-ui.form>
```

Атрибут `wire:submit` обязателен для корректной работы формы.

`id` рекомендуется.

Атрибуты `wire:recaptcha`, `class` опциональны.

Форма поддерживает обработку ошибок при использовании пакета [Livewire Recaptcha](https://github.com/DutchCodingCompany/livewire-recaptcha?ysclid=mcoxk9j1wk293939835). 

**Использование представленных ниже компонентов НЕ требует обязательного использования компонента `<form>`!**

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

### Multiselect

```bladehtml
<x-ui.multiselect wire:model="modelArray"
                  wire:key="w"
                  name="attributeValues.{{ $attribute->id }}"
                  :label="__('Label')"
                  :placeholder="__('Placeholder')"
                  :values="$valuesArray"
/>
```

`wire:key` опционален.

В примере используется запись значений в массив `modelArray`.

### Radio
```bladehtml
<x-ui.radio wire:model.live.debounce="statusFilter"
            name="filter"
            :values="$filterValues"
/>
```

В примере `wire:model.live.debounce`, но использовать можно и просто через `wire:model`.

### Toggle
```bladehtml
<x-ui.toggle wire:model="allowBackorder"
             id="allowBackorder"
             name="allowBackorder"
             :vertical="true"
             :label="__('Allow backorder?')"
/>
```

Атрибуты `wire:model`, `label` обязательны.

Атрибут `vertical` со значением `true` меняет внешний вид компонента, располагая лейбл и переключатель вертикально.

### Submit Button
Кнопка визуализирует процесс отправки формы.

```bladehtml
<x-ui.submit-button>{{ __('Save') }}</x-ui.submit-button>
```

### Modal

```bladehtml
<x-ui.modal wire:model="isModalOpen"
            id="brandModal"
            :title="__('Edit category')"
            size="max-w-md"
>
    Контент модального окна
</x-ui.modal>
```

Атрибуты `size`, `title` опциональны.

## TODO: confirm delete, form-tabs

## Авторы

- [Vladimir Bajenov](https://github.com/mountainclans)
- [Themesberg Flowbite](https://github.com/themesberg/flowbite) - этот пакет использует вёрстку базовых компонентов из Flowbite
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
