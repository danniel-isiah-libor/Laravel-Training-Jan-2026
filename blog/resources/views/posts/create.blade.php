
 <x-layouts::app :title="__('Create Post')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <flux:fieldset>
                <flux:legend>Create a New Post</flux:legend>

                    <div class="space-y-6">
        
                     <flux:input label="Title" name="title" class="max-w-sm" />
                     <flux:error name="title"/>
            
                     <flux:textarea label="Body" name="body" class="max-w-sm" />
                     <flux:error name="body"/>   
                     </div>
           
      
            <flux:button type="submit" variant="primary">Create Post</flux:button>
      
    </div>
            </flux:fieldset>
        </form>
</x-layouts::app>

