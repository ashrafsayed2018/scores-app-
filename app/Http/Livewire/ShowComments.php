<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;

class ShowComments extends Component
{

    public $post;
    public $comments;
    public $count;


    protected $listeners = ['commentAdded' => 'incrementCommentCount', 'allComments' => 'showAllComments'];

    public function incrementCommentCount()
    {
        $this->count = $this->post->comments->count();
    }

    public function showAllComments() {
        $this->comments = $this->post->comments;
    }

    public function mount(Post $post) {

        $this->post = $post;
        $this->comments = $this->post->comments;
        $this->count = $this->post->comments->count();

    }

    public function render()
    {
        return view('livewire.show-comments');
    }
}
