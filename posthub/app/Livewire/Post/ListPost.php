<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListPost extends Component
{   
    use WithPagination;

    public int $perPage = 10;

    public function loadMore() {
        $this->perPage += 10;
    }

    public function render()
    {   
        $posts = Post::latest()->paginate($this->perPage);

        $this->dispatch('render-content');

        return view('livewire.post.list-post', [
            'posts' => $posts
        ]);
    }
}
