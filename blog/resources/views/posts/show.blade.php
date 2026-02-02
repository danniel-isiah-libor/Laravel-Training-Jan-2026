<x-layouts::app :title="$post->title">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative overflow-hidden rounded-xl border border-neutral-200 p-6 dark:border-neutral-700">
            <flux:text>{{ $post->user->name }}</flux:text>
            <flux:text>{{ $post->user->email }}</flux:text>
            <flux:text class="mb-2 float-right">{{ $post->updated_at->diffForHumans() }}</flux:text>

            <h1 class="mb-4 text-2xl font-bold">{{ $post->title }}</h1>
            <div class="prose dark:prose-invert">
                {{ $post->body }}
            </div>

            <div class="mt-6 flex gap-2">
                <flux:button href="{{ route('dashboard') }}" variant="subtle">Back to Dashboard</flux:button>
                <flux:button href="{{ route('posts.edit', $post) }}" icon="pencil">Edit</flux:button>
                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                    onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <flux:button type="submit" variant="danger" icon="trash">Delete</flux:button>
                </form>
            </div>
        </div>
    </div>
</x-layouts::app>
