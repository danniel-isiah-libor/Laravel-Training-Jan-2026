 <x-layouts::app :title="__('Create Post')">
     <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
         <a href="#" aria-label="Latest on our blog">

             <flux:card size="lg" class="hover:bg-zinc-50 dark:hover:bg-zinc-700">

                 <flux:button class="mb-2" href="{{ route('posts.edit', ['post' => $post->id]) }}" variant="primary"
                     color="yellow">
                     Update </flux:button>

                 <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                     @csrf
                     @method('DELETE')

                     <flux:button class="mb-2" variant="danger" type="submit">Delete</flux:button>
                 </form>

                 <flux:text class="mb-2">{{ $post->user->name }}</flux:text>
                 <flux:text class="mb-2">{{ $post->user->email }}</flux:text>

                 <flux:text class="mb-2 float-right">{{ $post->updated_at->diffForHumans() }}</flux:text>

                 <flux:separator class="mb-2" />

                 <flux:heading class="mt-2"> {{ $post->title }}</flux:heading>
                 <flux:heading class="mt-2"> {{ $post->body }}</flux:heading>

                 <flux:separator class="mb-2" />



             </flux:card>
         </a>

     </div>

 </x-layouts::app>
