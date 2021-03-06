<?php

namespace App;

use App\Notifications\NewLikeAdded;
use Illuminate\Database\Eloquent\Builder;


trait Likeable
{

    // like a post or comment or reply

    public function like($user = null, $liked = true)
    {

        $this->likes()->updateOrCreate([

            'user_id' => $user ? $user->id : auth()->id,

        ], [
            'liked'   => true,
        ]);


        $post = Post::where('id', $this->commentable_id)->first();

        $this->user->notify(new NewLikeAdded($this, auth()->user(), $post));
    }


    // dislike a post or comment or reply

    public function dislike($user = null, $liked = false)
    {

        $this->likes()->updateOrCreate([

            'user_id' => $user ? $user->id : auth()->id,

        ], [
            'liked'   => false,
        ]);

        // remove from notifications table

        $post_favorite_notifications = auth()->user()->notifications()
            ->whereJsonContains('data->likeable_id', $this->id)->get();
        foreach ($post_favorite_notifications as $notification) {
            $notification->delete();
        }
    }

    // check if post or comment or reply is liked by a user

    public function isLikedBy(User $user, $likeable)
    {


        return (bool) $user->likes->where('likeable_id', $this->id)
            ->where('likeable_type', $likeable)
            ->where('liked', true)->count();
    }

    // check if post  or comment or reply is disliked by a user

    public function isDisLikedBy(User $user)
    {


        return (bool) $user->likes->where('likeable_id', $this->id)
            ->where('liked', false)->count();
    }

    // get the posts with likes

    public function scopeWithPostLikes(Builder $query)
    {

        $query->leftJoinSub(
            'SELECT likeable_id ,likeable_type, SUM(liked) as postlikes , SUM(!liked) as postdislikes FROM likes  GROUP BY likeable_id , likeable_type',
            'likes',
            'likes.likeable_id',
            'posts.id',
        );
    }

    // get the comment with likes

    public function scopeWithCommentLikes(Builder $query)
    {

        $query->leftJoinSub(
            'SELECT likeable_id , likeable_type, SUM(liked) as commentlikes , SUM(!liked) as commentdislikes FROM likes  GROUP BY likeable_id , likeable_type',
            'likes',
            'likes.likeable_id',
            'comments.id',
        );
    }
}
