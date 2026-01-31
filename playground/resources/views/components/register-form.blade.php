@props(['label', 'type' => 'text', 'name'])

<div>
    <div class="flex flex-col">
        <label class="mb-1" for="{{ $name }}"> {{ $label }}</label>
        <input class="py-2 px-3 outline-1 outline-gray-800 rounded-md mb-2" type="{{ $type }}"
            name="{{ $name }}" placeholder="{{ $placeholder }}">
        @error($name)
            <p class="text-red-500 mb-2">{{ $message }}</p>
        @enderror
    </div>
</div>
