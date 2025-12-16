@props([
    'label',
    'values',
    'placeholder' => __('Please, select'),
])

@php
    $localKey = $attributes->get('wire:model') . rand(1, 1000);
    $wireModel = $attributes->wire('model');
    if (str_contains($wireModel, '.')) {
        $explodedWire = explode('.', $wireModel);
        $selected = $this->{$explodedWire[0]}[$explodedWire[1]] ?? '';
    } else {
        $selected = $this->{$attributes->wire('model')->value} ?? '';
    }
@endphp

<div x-data="{
    isOpen: false
}"
     x-cloak
     class="relative"
     wire:key="{{ $localKey }}"
>
    <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</p>

    <div @click="isOpen = !isOpen"
         class="py-1 px-2 rounded-lg cursor-pointer bg-gray-50 border border-gray-300 hover:ring-primary-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 relative focus:outline-none focus:ring-1 focus:ring-blue-500 imitate-select"
         :class="{
            '!ring-1 !ring-blue-500': isOpen
         }"
         tabindex="0"
         @keydown.space.prevent="isOpen = !isOpen"
    >
        <div>
            @empty($selected)
                <div class="my-1 text-sm px-1 py-1 dark:text-white select-none">{{ $placeholder }}</div>
            @else
                @foreach($values as $key => $value)
                    @if(in_array($key, $selected))
                        <div class="inline-block my-1 text-sm px-2 py-1 rounded bg-gray-400 text-white">
                            {{ $value }}
                        </div>
                    @endif
                @endforeach
            @endempty
        </div>

        {{-- Loading --}}
        <div wire:loading.class="opacity-100"
             class="opacity-0 absolute right-3 top-[calc(50%-18px)] w-[36px] h-[36px] flex items-center text-sm rounded text-white"
        >
            <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101"
                 fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="#E5E7EB"/>
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentColor"/>
            </svg>
        </div>
        {{-- /Loading --}}
    </div>

    @error ($attributes->get('wire:model'))
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror

    @error ($attributes->get('wire:model') . '.*')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror

    <div x-show="isOpen"
         class="absolute z-20 mt-2"
         @click.outside="isOpen = false; $wire.$refresh()"
    >
        <ul class="w-100 max-w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white max-h-[300px] overflow-y-auto">

            @foreach ($values as $key => $value)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="{{ $localKey . $key }}"
                               type="checkbox"
                               wire:model="{{ $attributes->get('wire:model') }}"
                               {{ $attributes->except(['class', 'wire:model']) }}
                               value="{{ $key }}"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                        >
                        <label for="{{ $localKey . $key }}"
                               class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer"
                        >{{ $value }}</label>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>
