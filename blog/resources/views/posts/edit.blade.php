<x-layouts::app :title="__('Post Cedit')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <flux:fieldset>
                <flux:legend>Edit Post</flux:legend>

                <div class="space-y-6">
                    <flux:input label="Title" name="title" class="max-w-sm" value="{{ old('title', $post->title) }}" />

                    <flux:error name="title" />

                    <flux:textarea label="Body" name="body" class="max-w-sm"
                        value="{{ old('body', $post->body) }}" />

                    <flux:error name="body" />
                </div>


                <flux:button type="submit" variant="primary" color="blue">Update</flux:button>
            </flux:fieldset>
        </form>
    </div>
</x-layouts::app>
