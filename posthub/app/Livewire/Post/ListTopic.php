<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListTopic extends Component
{   
    public function selectTopic($topic)
    {   
        if($topic == 'All') {
            $this->dispatch('filter-posts', null);
        } else {
            $this->dispatch('filter-posts', $topic['topic']);
        }
    }

    public function getTopics()
    {
        return Post::query()
            ->select('topic', DB::raw('count(*) as total'))
            ->groupBy('topic')
            ->orderBy('total', 'desc')
            ->get();
    }

    public function render()
    {   
        $allTopics = Post::query()
            ->select('topic')
            ->count();

        return view('livewire.post.list-topic', [
            'topicList' => $this->getTopics(),
            'allTopics' => $allTopics
        ]);
    }
}
