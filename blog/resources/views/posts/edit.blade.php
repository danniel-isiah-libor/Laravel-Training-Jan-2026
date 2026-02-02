<x-layouts::app :title="__('Edit Post')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('posts.update', ['post' => $post]) }}" method="post">
            @csrf
            @method('PATCH')
            <flux:fieldset>
                <flux:legend>Edit Post</flux:legend>

                <div class="space-y-6">
                    <flux:input name="title" label="Title" value="{{ $post->title }}" class="max-w-sm" />
                    <flux:error name="title" />

                    <flux:textarea name="body" rows="6" label="Body" placeholder="" class="max-w-sm">
                        {{ $post->body }}</flux:textarea>
                    <flux:error name="body" />

                    <flux:button type="submit" variant="primary">Edit Post</flux:button>
                </div>
            </flux:fieldset>
        </form>
    </div>
</x-layouts::app>
