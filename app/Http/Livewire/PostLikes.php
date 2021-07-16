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

    // protected $listeners = ['updatePostLikeCount' => 'updateCount'];

    public function mount()
    {
        $this->count = $this->getCount();

    }

    // public function updateCount()
    // {
    //     $this->count = $this->getCount();

    //     return $this->count;

    // }

    public function getCount()
    {
        $postLikeCount = Like::where('likeable_type', 'App\Post')->where('likeable_id', $this->post->id)->where('liked', 1)->get()->count();
        return $postLikeCount;
    }



    public function store(Post $post) {

        $user = auth()->user();
        $this->post->like($user);
        $this->count= $this->getCount();
        // add scores to the user
        $user->scores()->updateOrCreate(
            [
          'post_id' => $this->post->id,

            ],
            [
                'score_type' => 'post_like',
                'scores'     => 1,
                'used'       => 0,
            ]
        );

        return back();
    }

    public function destroy(Post $post)
    {
        $user = auth()->user();

        $this->post->dislike($user);
        $this->count= $this->getCount();

        // decrease the scores
        $user->scores()->update([
            'post_id' => $this->post->id,
            'scores'     => 0,
          ]);
        return back();
    }


    public function render()
    {


        return view('livewire.post-likes');
    }
}
