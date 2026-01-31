<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        private string $authorProfileImg,
        private string $authorName,
        private string $authorUsername,
        private string $postContent,
        private ?string $postImage,
    ) {
        $this->authorUsername = "@{$this->authorUsername}";
        $this->postImage = $this->postImage ?? "";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post', [
            'author_profile_img' => $this->authorProfileImg,
            'author_name' => $this->authorName,
            'author_username' => $this->authorUsername,
            'post_content' => $this->postContent,
            'post_image' => $this->postImage
        ]);
    }
}
