<?php

namespace App\Http\Livewire;

use App\Like;
use App\Comment;
use Livewire\Component;

class ReplyLikes extends Component
{

    public $comment;


    public $count = 0;

    protected $listeners = ['updateReplyLikeCount' => 'updateCount'];

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
        $replyLikeCount = Like::where('likeable_type', 'App\Comment')->where('likeable_id', $this->comment->id)->where('liked', 1)->get()->count();
        return $replyLikeCount;
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
        return view('livewire.reply-likes');
    }
}
