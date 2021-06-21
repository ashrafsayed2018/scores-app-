<?php

namespace App\Http\Livewire;

use App\Like;
use App\Reply;
use Livewire\Component;

class ReplyLikes extends Component
{

    public $comment;
    public $reply;


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
        $replyLikeCount = Like::where('likeable_type', 'App\Reply')->where('likeable_id', $this->reply->id)->where('liked', 1)->get()->count();

        return $replyLikeCount;
    }



    public function store(Reply $reply) {

        $user = auth()->user();

        $this->reply->like($user);

        return back();
    }

    public function destroy(Reply $reply)
    {
        $user = auth()->user();

        $this->reply->dislike($user);

        return back();
    }
    public function render()
    {

        return view('livewire.reply-likes');
    }
}
