<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;


trait Likeable {

        // like a post

        public function like($user = null, $liked = true) {

            $this->likes()->updateOrCreate([

              'user_id' => $user ? $user->id : auth()->id,

            ], [
                'liked'   => true,
            ]);
        }


        // dislike a post

        public function dislike($user = null , $liked = false) {

            $this->likes()->updateOrCreate([

                'user_id' => $user ? $user->id : auth()->id,

              ], [
                  'liked'   => false,
              ]);
        }

        // check if post is liked by a user

        public function isLikedBy(User $user , $likeable) {


           return (bool) $user->likes->where('likeable_id' ,$this->id)
           ->where('likeable_type' ,$likeable)
                         ->where('liked' , true)->count();

        }

        // check if post is disliked by a user

        public function isDisLikedBy(User $user) {


            return (bool) $user->likes->where('likeable_id' ,$this->id)
            ->where('liked' , false)->count();
        }

       // get the posts with likes

        public function scopeWithLikes (Builder $query) {

            $query->leftJoinSub(
                'SELECT likeable_id, SUM(liked) as likes , SUM(!liked) as dislikes FROM likes GROUP BY 	likeable_id',
                'likes',
                'likes.likeable_id',
                'posts.id'
            );
        }
}
