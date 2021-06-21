<?php

namespace App\Http\Livewire;

use App\Like;
use App\Comment;
use Livewire\Component;

class CommentLikes extends Component
{

    public $comment;


    public $count = 0;

    protected $listeners = ['updateCommentLikeCount' => 'updateCount'];

    public function mount()
    {
        $this->updateCount();

    }

    public function updateCount()
    {
        $this->count = $this->getCount();

        return $this->count;

    }

    public function getCount()
    {
        $commentLikeCount = Like::where('likeable_type', 'App\Comment')->where('likeable_id', $this->comment->id)->where('liked', 1)->get()->count();
        return $commentLikeCount;
    }



    public function store(Comment $comment) {


        $user = auth()->user();

        $this->comment->like($user);



        return back();
    }

    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        $this->comment->dislike($user);
        return back();
    }
    public function render()
    {
        return view('livewire.comment-likes');
    }
}
