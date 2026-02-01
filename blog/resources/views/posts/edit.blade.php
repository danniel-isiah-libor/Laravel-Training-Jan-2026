<x-layouts::app :title="__('Edit Post')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <flux:fieldset>
                <flux:legend>Edit post</flux:legend>

                <div class="space-y-6">
                    <flux:input label="Title" class="max-w-full" name="title" value="{{ old('title', $post->title) }}" />

                    <flux:textarea label="Body" class="max-w-full" name="body" rows="10">
                        {{ old('body', $post->body) }}</flux:textarea>

                    <flux:error name="body" />

                    <div class="flex gap-2">
                        <flux:button type="submit" variant="primary" class="cursor-pointer">Update Post</flux:button>
                        <flux:button href="{{ route('posts.show', $post) }}" variant="ghost" class="cursor-pointer">
                            Cancel</flux:button>
                    </div>
                </div>
            </flux:fieldset>
        </form>
    </div>
</x-layouts::app>
