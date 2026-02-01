@props(['icon', 'label', 'route', 'isActive'])

<a href="{{ $route }}" @class([
    'flex md:p-4 gap-2 text-sm items-center font-semibold',
    'text-sky-500' => $isActive,
    'hover:text-sky-500' => !$isActive,
])>
    <div class="w-6">
        @include("icons.$icon")
    </div>
    <span class="hidden md:inline">{{ $label }}</span>
</a>
