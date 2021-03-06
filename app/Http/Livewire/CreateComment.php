<?php

namespace App\Http\Livewire;

use App\Comment;
use App\Notifications\NewCommentAdded;
use Livewire\Component;
use Illuminate\Http\Request;

class CreateComment extends Component
{

    public $post;
    public $body;
    public $post_id;
    public $comment;
    public $count;

    protected $rules = [
        'body' => 'required|min:6|max:255',
    ];

    public function mount($post) {

        $this->post_id = $post->id;
        $this->count = $this->post->comments->count();

    }

    public function store() {

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

             // add scores to the user
             $user->scores()->updateOrCreate([
                'user_id' => $user->id,
                'post_id' => $this->post->id,
                'score_type' => 'comment',
                'scores'     => 1,
                'used'       => 0,
              ]);


        $this->post->user->notify(new NewCommentAdded($this->post,auth()->user()));

        $this->reset('body');
        $this->emit('commentAdded');
        $this->emit('allComments');

        return back();
    }

    public function render() {
        return view('livewire.create-comment');
    }
}
