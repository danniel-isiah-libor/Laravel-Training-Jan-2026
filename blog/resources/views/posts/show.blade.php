<x-layouts::app :title="__('Post Show')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <flux:card size="lg" class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
            <flux:text>{{ $post->user->name }}</flux:text>
            <flux:text class="mb-2">{{ $post->user->email }}</flux:text>

            <flux:text class="mb-2 float-right">{{ $post->updated_at->diffForHumans() }}</flux:text>

            <flux:separator class="mb-2" />

            <flux:heading class="flex items-center gap-2">{{ $post->title }}</flux:heading>

            <flux:text class="mt-2">{{ $post->body }}</flux:text>
        </flux:card>
    </div>
</x-layouts::app>
