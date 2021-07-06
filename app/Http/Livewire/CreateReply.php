<?php

namespace App\Http\Livewire;

use App\Reply;
use Livewire\Component;

class CreateReply extends Component
{

    public $comment;
    public $body;
    public $post;
    public $comment_id;
    public $post_id;

    protected $rules = [
        'body' => 'required|min:6|max:255',
    ];

    public function mount($comment, $post) {

        $this->comment_id = $comment->id;
        $this->post_id = $post->id;

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $reply = new Reply();

        $user = auth()->user();

        $this->validate();

        $reply->create([
            'user_id' => $user->id,
            'parent_id' => $this->comment_id,
            'body' => $this->body,
            'commentable_id' => $this->post_id,
            'commentable_type' => 'App\Post'
        ]);

        $this->reset('body');
        $this->emit('commentAdded');
        $this->emit('allComments');
        return back();

    }

    public function render()
    {
        return view('livewire.create-reply');
    }
}
