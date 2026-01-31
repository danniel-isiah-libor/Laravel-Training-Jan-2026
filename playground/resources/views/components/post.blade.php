<div class="flex items-start gap-2 mb-4">
    <img src="{{ $author_profile_img }}" class="rounded-full w-10" alt="">
    <div class="flex flex-col text-sm w-full">
        <h3 class="font-bold">{{ $author_name }} <span class="text-neutral-500 font-normal">{{ $author_username }}</span></h3>
        <p>{{ $post_content }}</p>
        <img src="{{ $post_image }}" class="mt-4" alt="">
        <div class="flex mt-4 justify-between">
            <a href="#" class="flex text-xs text-neutral-500 gap-1 items-center">
                <img src="{{ asset('images/comment-logo.svg') }}" alt="">
                <span>123</span>
            </a>
            <div class="flex text-xs text-neutral-500 gap-1 items-center">
                <img src="{{ asset('images/repost-logo.svg') }}" alt="">
                <span>123</span>
            </div>
            <div class="flex text-xs text-neutral-500 gap-1 items-center">
                <img src="{{ asset('images/heart-logo.svg') }}" alt="">
                <span>123</span>
            </div>
        </div>
    </div>
</div>
