<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ListPostByProfile extends Component
{   
    use WithPagination;

    public $selectedTopic = null;
    public $user_id;
    public int $perPage = 10;

    #[On('filter-posts')]
    public function filterPosts($topic)
    {   
        $this->selectedTopic = $topic;
    } 

    public function loadMore() {
        $this->perPage += 10;
    }

    public function getPosts()
    {
        return Post::query()
            ->when($this->selectedTopic, function ($query) {
                $query->where('topic', $this->selectedTopic);
            })
            ->where('user_id', $this->user_id)
            ->latest()
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.post.list-post-by-profile', [
            'posts' => $this->getPosts()
        ]);
    }
}
