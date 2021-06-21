<?php

namespace App\Http\Livewire;

use App\Post;
use App\Comment;
use Livewire\Component;
use Illuminate\Http\Request;

class CreateComment extends Component
{

    public $post;
    public $body;
    public $post_id;

    protected $rules = [
        'body' => 'required|min:6|max:255',
        'post_id' => 'required',
    ];

    public function mount($post) {


        $this->post_id = $post->id;
    }

    public function store()
    {

        $user = auth()->user();

        $comment = new Comment;

        $this->validate();

        $comment->create([
            'user_id' => $user->id,
            'parent_id' => 0,
            'body' => $this->body,
            'commentable_id' => $this->post_id,
            'commentable_type' => 'App\Post'
        ]);

        $this->reset();

        return back();
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}