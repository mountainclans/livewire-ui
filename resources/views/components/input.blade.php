@props([
    'name',
    'label',
    'id',
    'type' => 'text',
    'offsetClass' => '',
    'placeholder' => '',
    'prefix' => false,
])

@php
    if (empty($control)) {
        $control = '';
    }

    if (empty($name)) {
        $name = $attributes->wire('model')->value();
    }

    if (empty($id)) {
        $id = $attributes->wire('model')->value() . '-' . uniqid();
    }
@endphp

<div @if (!empty($offsetClass)) class="{{ $offsetClass }}" @endif>
    @if ($label)
        <div class="flex justify-between items-center">
            <label class="flex flex-wrap w-full mb-2 text-sm font-medium text-gray-900 dark:text-white"
                   @if($id) for="{{ $id }}" @endif
            >
                <p class="w-full">{{ $label }}</p>
            </label>

            {{ $control }}
        </div>
    @endif

    <div class="w-full">
        <div class="flex items-center">
            @if ($prefix)
                <span class="mr-1 text-md text-gray-700 dark:text-gray-400">{{ $prefix }}</span>
            @endif

            @if ($type === 'textarea')
                <textarea name="{{ $name }}"
                          id="{{ $id }}"
                          @if ($placeholder) placeholder="{{ $placeholder }}" @endif
                    {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-600 dark:border-gray-500 placeholder:text-gray-400 dark:placeholder:!text-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }}
            ></textarea>
            @else
                <input type="{{ $type }}"
                       name="{{ $name }}"
                       id="{{ $id }}"
                       @if ($placeholder) placeholder="{{ $placeholder }}" @endif
                       {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-3 dark:bg-gray-600 dark:border-gray-500 placeholder:text-gray-400 dark:placeholder:!text-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }}
                       :class="{
                        'bg-gray-300 dark:bg-gray-800 border border-dashed cursor-not-allowed': {{ (int)$attributes->get('disabled') }}
                   }"
                />
            @endif
        </div>
    </div>

    @if (!isset($attributes['translatable']))
        @error ($name)
        <p error-bag class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    @endif
</div>
