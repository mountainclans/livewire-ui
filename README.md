# Set of UI components for Livewire 3

## Установка

Установите пакет при помощи Composer:

```bash
composer require mountainclans/livewire-ui
```

_Обратите внимание, что для корректной стилизации в вашем проекте должен использоваться TailwindCSS._

Добавьте в `tailwind.config.js` в секцию `content`:

```js
'./vendor/mountainclans/livewire-ui/resources/views/**/*.blade.php'
```

--- 
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
           :indicate-loading="false"
>
Контент формы
</x-ui.form>
```

Атрибут `wire:submit` обязателен для корректной работы формы.

`id` рекомендуется.

Атрибуты `wire:recaptcha`, `class`, `indicate-loading` опциональны.

Если установлен `:indicate-loading="false"`, форма не будет "мигать" при ajax-запросах.

Форма поддерживает обработку ошибок при использовании пакета [Livewire Recaptcha](https://github.com/DutchCodingCompany/livewire-recaptcha?ysclid=mcoxk9j1wk293939835). 

**Использование представленных ниже компонентов НЕ требует обязательного использования компонента `<form>`!**

### Input
**Компонент может использоваться в качестве [\<translatable>](https://github.com/mountainclans/livewire-translatable) поля.**

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

Компонент автоматически синхронизируется с бэкендом при клике снаружи. **Не используйте `wire:model.live`.**

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

### Confirm delete
Модальное окно с запросом подтверждения выполнения действия. Чаще всего используется при удалении записей.

```bladehtml
<x-ui.confirm-delete id="brandModalDelete"
                     control-attribute="isDeleteModalOpen"
                     submit-action="deleteBrand('{{ $brandId }}')"
                     :question-text="__('Are you sure you want to delete this brand?')"
                     :submitText="__('Yes, I'm sure')"
                     :cancelText="__('No, cancel')"
                     
/>
```

Для использования в родительском компоненте нужно задать bool-атрибут и передать его имя в prop `control-attribute`. В момент необходимости показа данного окна установить этот контрольный атрибут в true.


### Form tabs

`DEPRECATED`, вместо этого компонента используйте [пакет от Spatie](https://github.com/spatie/laravel-livewire-wizard).

Добавляет визуальные "вкладки", среди которых представлены нужные компоненты. Текущая страница будет подсвечена.

**Внимание! Данный компонент не занимается менеджментом переходов между вкладками.**

```bladehtml
<x-ui.form-tabs :model-id="$modelId" :tabs="$tabs" />
```

В родительском компоненте:

```php
public string $modelId = '';
public array $tabs = [];

public function mount(?string $modelId = null) {
    $this->modelId = $modelId;
    $this->tabs = [
            [
                'title' => __('General'),
                'title_long_before' => '',
                'title_long_after' => '',
                'match_routes' => ['purchases.create', 'purchases.edit'],
                'route' => $modelId ? route('purchases.edit', $modelId) : null,
            ],
            [
                'title' => __('Items'),
                'title_long_before' => __(''),
                'title_long_after' => __(' & Publish'),
                'match_routes' => ['purchases.items'],
                'route' => $modelId ? route('purchases.items', $modelId) : null,
            ],
        ];
}
```

## Авторы

- [Vladimir Bajenov](https://github.com/mountainclans)
- [Themesberg Flowbite](https://github.com/themesberg/flowbite) - этот пакет использует вёрстку базовых компонентов из Flowbite
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
