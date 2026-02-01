<x-layouts::app :title="__('Post Create')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <flux:fieldset>
                <flux:legend>Create a new post</flux:legend>

                <div class="space-y-6">
                    <flux:input label="Title" class="max-w-full" name="title" />

                    <flux:textarea label="Body" class="max-w-full" name="body" rows="10" />

                    <flux:error name="body" />

                    <flux:button type="submit" variant="primary" class="cursor-pointer">Create Post</flux:button>
                </div>
            </flux:fieldset>
        </form>
    </div>
</x-layouts::app>
