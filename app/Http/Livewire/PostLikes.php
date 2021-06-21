<?php

namespace App\Http\Livewire;

use App\Like;
use App\Post;
use App\Likeable;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class PostLikes extends Component
{

    use Likeable;
    public $post;
    public $count = 0;

    protected $listeners = ['updatePostLikeCount' => 'updateCount'];

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
        $postLikeCount = Like::where('likeable_type', 'App\Post')->where('likeable_id', $this->post->id)->where('liked', 1)->get()->count();
        return $postLikeCount;
    }



    public function store(Post $post) {


        $user = auth()->user();

        $this->post->like($user);

        return back();
    }

    public function destroy(Post $post)
    {
        $user = auth()->user();

        $this->post->dislike($user);
        return back();
    }


    public function render()
    {


        return view('livewire.post-likes');
    }
}
