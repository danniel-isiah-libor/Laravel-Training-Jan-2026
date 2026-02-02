<x-layouts::app :title="__('Post Edit')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <flux:fieldset>
                <flux:legend>Edit a post</flux:legend>

                <div class="space-y-6">
                    <flux:input label="Title" name="title" class="max-w-sm" value="{{ $post->title }}" />

                    <flux:error name="title" />

                    <flux:textarea label="Body" name="body" class="max-w-sm">{{ $post->body }}</flux:textarea>

                    <flux:error name="body" />
                </div>

                <flux:button type="submit" variant="primary">Update Post</flux:button>
            </flux:fieldset>
        </form>
    </div>
</x-layouts::app>
