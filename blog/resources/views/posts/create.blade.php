<x-layouts::app :title="__('Create Post')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <flux:fieldset>
                <flux:legend>Create a New Post</flux:legend>

                <div class="space-y-6">
                    <flux:input name="title" label="Title" placeholder="" class="max-w-sm" />
                    <flux:error name="title" />

                    <flux:textarea name="body" rows="6" label="Body" placeholder="" class="max-w-sm" />
                    <flux:error name="body" />

                    <flux:button type="submit" variant="primary">Create Post</flux:button>
                </div>
            </flux:fieldset>
        </form>
    </div>
</x-layouts::app>
