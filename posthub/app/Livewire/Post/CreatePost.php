<?php

namespace App\Livewire\Post;

use Exception;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreatePost extends Component
{   
    public $title;
    public $topic;
    public $content;

    public function submit()
    {   
        $this->validate();
        
        try {
            DB::transaction(function () {
                Post::create([
                    'title' => $this->title,
                    'topic' => $this->topic,
                    'content' => trim($this->content),
                ]);

                $this->dispatch('dispatch-toast', detail: [
                    'type' => 'success',
                    'title' => 'Success!',
                    'message' => "A new post has beeen created"
                ]);

                // reset form
                $this->reset();
                $this->dispatch('reset-content');
            });
        } catch (Exception $e) {
            $this->dispatch('dispatch-toast', detail: [
                'type' => 'danger',
                'title' => 'Danger!',
                'message' => "Something went wrong"
            ]);
        }
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'topic' => ['required', 'string'],
            'content' => ['required', 'string']
        ];
    }

    public function render()
    {   
        $topicList = Post::select('topic')->distinct()->get()->pluck('topic');

        return view('livewire.post.create-post', compact('topicList'));
    }
}
