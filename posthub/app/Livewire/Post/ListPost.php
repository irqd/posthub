<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class ListPost extends Component
{
    public function render()
    {   
        $posts = Post::latest()->get();

        return view('livewire.post.list-post', [
            'posts' => $posts
        ]);
    }
}
