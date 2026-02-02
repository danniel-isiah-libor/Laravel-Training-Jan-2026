<x-layouts::app :title="__('Edit Post')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <flux:fieldset>
                <flux:legend>Edit Post</flux:legend>

                <div class="space-y-6">
                    <flux:input name="title" label="Title" class="max-w-sm" value="{{ old('title', $post->title) }}" />
                    <flux:error name="title" />

                    <flux:textarea name="body" label="Body" class="max-w-sm" value="{{ old('body', $post->body) }}" />
                    <flux:error name="body" />

                    <div class="flex gap-2">
                        <flux:button type="submit" class="cursor-pointer">Update Post</flux:button>
                        <flux:button href="{{ route('dashboard') }}" variant="subtle">Cancel</flux:button>
                    </div>
                </div>
            </flux:fieldset>
        </form>
    </div>
</x-layouts::app>
