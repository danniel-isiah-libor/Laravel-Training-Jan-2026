@props(['id', 'placeholder', 'type' => 'text'])

<div>
    <input @class([
        'bg-neutral-800 rounded-md px-4 py-3 text-neutral-400 w-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-500',
    ]) type="{{ $type }}" id="{{ $id }}" placeholder="{{ $placeholder }}">
</div>
