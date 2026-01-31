@props(['id'])

<div class="flex text-neutral-500 gap-3 items-start">
    <input id="{{ $id }}" type="checkbox" name="{{ $id }}" required
        class="cursor-pointer min-w-5 h-5 col-start-1 row-start-1 appearance-none rounded-sm border border-white/10 bg-white/5 checked:border-white checked:bg-white indeterminate:border-white indeterminate:bg-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white disabled:border-white/5 disabled:bg-white/10 disabled:checked:bg-white/10 forced-colors:appearance-auto" />
    <label class="text-xs" for="{{ $id }}">{{ $slot }}</label>
</div>
