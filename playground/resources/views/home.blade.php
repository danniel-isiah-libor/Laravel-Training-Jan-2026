<x-layout title="Home Page" class="flex">
    <x-side-nav />
    <main class="md:border-x md:border-x-neutral-800 basis-full md:basis-9/12">
        <header>
            <div class="container mx-auto p-3">
                <h1 class="text-lg font-bold">Home</h1>
            </div>
            <x-forms.separator />
            <div class="container mx-auto p-3">
                <div class="flex items-start gap-2">
                    <img src="https://i.pravatar.cc/30" class="rounded-full w-10" alt="">
                    <form action="" method="post" class="w-full flex flex-col gap-2">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <textarea class="resize-none overflow-hidden w-full focus-visible: outline-none" name="post_content" rows="2"
                                id="post_content" placeholder="What's happening?"></textarea>
                            <div id="img_container" class="hidden relative">
                                <button type="button" id="img_remove" class="cursor-pointer absolute top-1 right-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="m336-280-56-56 144-144-144-143 56-56 144 144 143-144 56 56-144 143 144 144-56 56-143-144-144 144Z"/></svg>
                                </button>
                                <img src="" id="img_preview" alt="">
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div>
                                <label for="img_input" class="cursor-pointer">
                                    <img src="{{ asset('images/img-logo.svg') }}" alt="">
                                </label>
                                <input type="file" id="img_input" accept="images/*" hidden>
                            </div>
                            <button type="submit" class="ml-auto text-xs px-8 py-2 bg-sky-500 rounded-4xl cursor-pointer font-bold">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </header>
        <x-forms.separator thickness="3px" />
        <div class="grid grid-cols-1">
            <div class="container mx-auto px-3 mt-3">
                <x-post
                    authorProfileImg="https://i.pravatar.cc/30"
                    authorName="Simon Javier"
                    authorUsername="simonjavier"
                    postContent="Life Update : I’m joining a new company today. Honored to have worked with amazing people. Hope I don’t go back. Yay!"
                    postImage="https://picsum.photos/id/237/400/300"
                />
            </div>
            <x-forms.separator />
            <div class="container mx-auto px-3 mt-3">
                <x-post
                    authorProfileImg="https://i.pravatar.cc/30"
                    authorName="Simon Javier"
                    authorUsername="simonjavier"
                    postContent="Life Update : I’m joining a new company today. Honored to have worked with amazing people. Hope I don’t go back. Yay!"
                    postImage="https://picsum.photos/id/237/400/300"
                />
            </div>
            <x-forms.separator />
        </div>
    </main>

    @vite(['resources/js/home.js'])
</x-layout>
