<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        @if (empty($posts))

            <h1>There is no currently posted!</h1>
        @else
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post) }}" aria-label="Latest on our blog">
                    <flux:card size="sm" class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
                        <flux:heading class="flex items-center gap-2">{{ $post->title }}
                            <flux:icon name="arrow-up-right" class="ml-auto text-zinc-400" variant="micro" />
                        </flux:heading>
                        <flux:text class="mt-2 truncate text-ellipsis">{{ $post->body }}</flux:text>
                    </flux:card>
                </a>
            @endforeach

        @endif

        {{ $posts->links() }}
        {{-- <flux:pagination :paginator="$posts" /> --}}
        {{-- {{ $pagination = $posts->links() }} --}}
        {{-- <flux:pagination :paginator="$pagination" /> --}}
    </div>
</x-layouts::app>
