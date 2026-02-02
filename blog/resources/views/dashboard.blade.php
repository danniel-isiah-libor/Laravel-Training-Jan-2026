<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            @foreach ($posts as $post)
                <div class="relative overflow-hidden rounded-xl border border-neutral-200 p-4 dark:border-neutral-700">
                    <h2 class="text-lg font-bold">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-500">{{ Str::limit($post->body, 100) }}</p>
                    <div class="mt-4 flex gap-2">
                        <flux:button href="{{ route('posts.show', $post) }}" size="sm">Read More</flux:button>
                        <flux:button href="{{ route('posts.edit', $post) }}" size="sm" icon="pencil"></flux:button>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <flux:button type="submit" variant="danger" size="sm" icon="trash"></flux:button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
</x-layouts::app>
