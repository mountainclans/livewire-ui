@props([
    'tabs',
    'modelId' => null,
    'afterSize' => 35,
])

@php
    $isBeforeCurrentRoute = true;
@endphp


<ol wire:ignore
    class="flex justify-center items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base mb-7"
>
    @foreach ($tabs as $tab)
        @php
            $isCurrentRoute = false;
            foreach ($tab['match_routes'] as $match){
                if (request()->routeIs($match)) {
                    $isCurrentRoute = true;
                    $isBeforeCurrentRoute = false;
                    break;
                }
            }
            $disabled = (!$isCurrentRoute && !$modelId) || (!$isCurrentRoute && is_null($tab['route']));
            $isLastChild = end($tabs)['title'] === $tab['title'];
        @endphp

        <li @class([
            "flex items-center select-none",
            "after:w-[35px] after:h-1 after:hidden sm:after:inline-block after:mx-6 sm:after:content-[''] after:border-b after:border-1 after:border-gray-200 dark:after:border-gray-700" => !$isLastChild,
            'text-blue-600 dark:text-blue-500' => $isCurrentRoute,
            'text-gray-600 dark:text-gray-500' => $disabled,
            'hover:text-blue-600 dark:hover:text-blue-500' => !$disabled,
        ])
            @if($disabled) disabled-element @endif
            @if($isCurrentRoute) current-element @endif
            @if($modelId) element-with-empty-id @endif
        >
            <a href="{{ $tab['route'] }}"
               @class(['cursor-not-allowed' => $disabled])
               @if($disabled) @click.prevent disabled @endif
               @if(!$disabled && !$isCurrentRoute) wire:navigate @endif
               @if($isCurrentRoute) @click.prevent aria-current="page" @endif
            >
                <span @class([
                    'flex items-center',
                    "after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500" => !$isLastChild
                ])>

                    @if($isCurrentRoute || $isBeforeCurrentRoute)
                        <svg class="w-3.5 h-3.5 sm:w-5 sm:h-5 me-2.5"
                             aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg"
                             width="24"
                             height="24"
                             fill="currentColor"
                             viewBox="0 0 24 24"
                        >
                          <path fill-rule="evenodd"
                                d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                clip-rule="evenodd"/>
                        </svg>
                    @else
                        <svg class="w-3.5 h-3.5 sm:w-5 sm:h-5 me-2.5"
                             aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg"
                             width="24"
                             height="24"
                             fill="none"
                             viewBox="0 0 24 24"
                        >
                            <path stroke="currentColor"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"
                            />
                        </svg>

                    @endif

                    @if(!empty($tab['title_long_before']))
                        <span
                            class="hidden md:inline-flex md:mx-2 w-auto flex-shrink-0">{{ $tab['title_long_before'] }}</span>
                    @endif

                    <span class="w-auto flex-shrink-0">{{ $tab['title'] }}</span>

                    @if(!empty($tab['title_long_after']))
                        <span
                            class="hidden md:inline-flex md:mx-2 w-auto flex-shrink-0">{{ $tab['title_long_after'] }}</span>
                    @endif
            </span>
            </a>
        </li>

    @endforeach

</ol>
