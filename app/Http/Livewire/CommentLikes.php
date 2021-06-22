<?php

namespace App\Http\Livewire;

use App\Like;
use App\Comment;
use Livewire\Component;

class CommentLikes extends Component
{

    public $comment;

    public $count = 0;


    public function mount()
    {

       $this->count =  $this->getCount();
    }


    public function getCount()
    {
        $commentLikeCount = Like::where('likeable_type', 'App\Comment')->where('likeable_id', $this->comment->id)->where('liked', 1)->get()->count();
        return $commentLikeCount;
    }



    public function store(Comment $comment) {

        $user = auth()->user();

        $this->comment->like($user);

        $this->count = $this->getCount();


        return back();
    }

    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        $this->comment->dislike($user);
        $this->count = $this->getCount();
        return back();
    }
    public function render()
    {
        return view('livewire.comment-likes');
    }
}
