<x-layouts::app :title="__('Post Show')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex gap-4 grid-cols-4">
            <flux:button href="{{ route('posts.edit', ['post' => $post->id]) }}" variant="primary" color="yellow">Edit
            </flux:button>

            <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                @csrf
                @method('DELETE')
                <flux:button type="submit" variant="danger" color="red">Delete</flux:button>
        </div>
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" aria-label="Latest on our blog">
            <flux:card size="lg" class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
                <flux:text>{{ $post->user->name }}</flux:text>
                <flux:text class="mb-2">{{ $post->user->email }}</flux:text>

                <flux:text class="mb-2 float-right">{{ $post->updated_at->diffForHumans() }}</flux:text>

                <flux:heading class="flex items-center gap-2">{{ $post->title }}

                </flux:heading>
                <flux:text class="mt-2">{{ $post->body }}
                </flux:text>
            </flux:card>
        </a>
    </div>
</x-layouts::app>
