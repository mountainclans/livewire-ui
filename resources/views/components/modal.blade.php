@props(['id', 'size' => 'max-w-md', 'title' => ''])

<div id="{{ $id }}"
     x-data="{ open: @entangle($attributes->wire('model')) }"
     x-cloak
     :aria-modal="open"
     :aria-hidden="!open"
     :class="open ? 'fixed top-0 right-0 left-0 z-50' : 'hidden'"
    {{ $attributes
        ->except('wire:model')
        ->merge(['class' => 'overflow-y-auto overflow-x-hidden justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full'])
    }}
>

    <div :class="open ? ' flex' : 'hidden'"
         class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    >
        <div class="relative p-4 w-full max-h-full {{ $size }}">
            <div @click.outside="open = false"
                 class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                @if (!empty($title))
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $title }}
                        </h3>

                        <button @click="open = false"
                                type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        >
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                @endif
                <!-- /Modal header -->

                <!-- Modal body -->
                {{ $slot }}
                <!-- /Modal body -->
            </div>
        </div>
    </div>

    <div x-show="open"
         class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"
    ></div>
</div>
