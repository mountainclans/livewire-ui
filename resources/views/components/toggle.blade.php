@props([
    'label',
    'name' => 'toggle_' . rand(0, 1000),
    'vertical' => false,
])

<div>
    <label @class([
        "inline-flex cursor-pointer",
        'flex-col items-start' => $vertical,
        'items-center' => !$vertical,
    ])>
        <input type="checkbox"
               value=""
               class="sr-only peer"
            {{ $attributes->except('class') }}
        >

        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600 order-1"></div>

        <span @class([
            'text-sm font-medium text-gray-900 dark:text-gray-300',
            'mb-1 order-0' => $vertical,
            'ms-3 order-2' => !$vertical,
        ])>{{ $label }}</span>
    </label>

    @error ($name)
    <p error-bag class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
