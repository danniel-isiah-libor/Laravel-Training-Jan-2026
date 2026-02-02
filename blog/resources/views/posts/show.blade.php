<x-layouts::app :title="__('Post')">
    <div class="flex py-3">
        <div>
            <flux:text class="text-sm">{{ $post->user->name }}</flux:text>
            <flux:text class="text-xs mb-2 text-neutral-500">{{ $post->user->email }}</flux:text>
        </div>
        @can('update', $post)
            <div class="ml-auto flex gap-4">
                <flux:button variant="primary" href="{{ route('posts.edit', ['post' => $post]) }}">Edit</flux:button>
                <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <flux:button variant="danger" class="pointer-cursor" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#FFFFFF">
                            <path
                                d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                        </svg>
                    </flux:button>
                </form>
            </div>
        @endcan
    </div>

    <flux:separator variant="subtle" />

    <div class="py-3">
        <flux:heading class="mt-2" size="xl" level="1">{{ $post->title }}</flux:heading>
        <flux:text class="mt-2 mb-6 text-base">{{ $post->body }}</flux:text>
        <flux:text class="text-xs mb-2 text-neutral-500">{{ $post->updated_at->diffForHumans() }}</flux:text>
    </div>

</x-layouts::app>
