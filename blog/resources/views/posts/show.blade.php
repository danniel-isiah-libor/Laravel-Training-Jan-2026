<x-layouts::app :title="__('Post show')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <flux:card size="lg" class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
            <flux:text>{{ $post->user->name }}</flux:text>
            <flux:text class="mt-2">{{ $post->user->name }}.</flux:text>


            <flux:separator />

            <flux:heading heading="h2" class="mt-4">{{ $post->title }}</flux:heading>
            <flux:text class="mt-2">{{ $post->body }}</flux:text>


            <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}" class="mt-4">
                @csrf
                @method('DELETE')
                <flux:button type="submit" variant="danger" color="red">Delete</flux:button>

            </form>
            <flux:button href="{{ route('posts.edit', ['post' => $post->id]) }}" variant="primary" color="yellow">
                Edit
            </flux:button>


        </flux:card>
    </div>
</x-layouts::app>
