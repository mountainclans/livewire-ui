<div class="relative">
    <form {{ $attributes }}>
        {{ $slot }}

        @error ('gRecaptchaResponse')
        <div class="space-y-4">
            <p class="text-theme-distructive text-sm">{{ $message }}</p>
        </div>
        @enderror
    </form>

    <div wire:loading.class="!block"
         class="hidden absolute inset-0 bg-white bg-opacity-50"
    ></div>
</div>


