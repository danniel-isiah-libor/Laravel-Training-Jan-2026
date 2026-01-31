@props(['header'])

<header>
    <h1 class="text-3xl font-bold">{{ $header }}</h1>
    <p class="mt-2 text-xs text-neutral-500">{{ $slot }}</p>
</header>
