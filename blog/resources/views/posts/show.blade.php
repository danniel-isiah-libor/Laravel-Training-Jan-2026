<x-layouts::app :title="$post->title">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <flux:card>
            <div class="mb-4 flex items-center justify-between">
                <div class="">
                    <flux:text class="whitespace-pre-wrap">{{ $post->user->name }}</flux:text>
                    <flux:text class="mb-2 whitespace-pre-wrap">{{ $post->user->email }}</flux:text>
                    <flux:heading size="lg">{{ $post->title }}</flux:heading>
                </div>
                <div class="flex gap-2">
                    <flux:button href="{{ route('posts.edit', $post) }}" variant="primary" size="sm">Edit
                    </flux:button>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <flux:button type="submit" variant="danger" size="sm">Delete</flux:button>
                    </form>
                </div>
            </div>

            <flux:separator />

            <flux:text class="mt-4 whitespace-pre-wrap">{{ $post->body }}</flux:text>

            <flux:separator class="mt-6" />

            <div class="mt-4 flex items-center justify-between text-sm text-zinc-500">
                <span>Created: {{ $post->created_at->format('M d, Y') }}</span>
                <span>Updated: {{ $post->updated_at->diffForHumans() }}</span>
            </div>

            <div class="mt-4">
                <flux:button href="{{ route('dashboard') }}" variant="ghost" size="sm">
                    <flux:icon name="arrow-left" variant="micro" /> Back to Dashboard
                </flux:button>
            </div>
        </flux:card>
    </div>
</x-layouts::app>
