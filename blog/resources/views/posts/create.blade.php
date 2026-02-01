<x-layouts::app :title="__('Post Create')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <flux:fieldset>
                <flux:legend>Create a new post</flux:legend>

                <div class="space-y-6">
                    <flux:input name="title" label="Title" class="max-w-sm" />
                    <flux:error name="title" />

                    <flux:textarea name="body" label="Body" class="max-w-sm" />
                    <flux:error name="body" />

                    <flux:button type="submit" class="cursor-pointer">Create Post</flux:button>
                </div>
            </flux:fieldset>
        </form>
    </div>
</x-layouts::app>
