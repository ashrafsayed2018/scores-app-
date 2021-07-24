<?php

namespace App;

use App\Notifications\NewFollower;

trait Followable
{

    public function follows()
    {

        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    // followers

    public function followers()
    {

        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }

    public function follow(User $user)
    {

        $user->notify(new NewFollower(auth()->user()));
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {

        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {

        if ($this->following($user)) {

            // remove scores to the user
            $this->scores()->updateOrCreate(
                [
                    'user_id' => $this->id,
                    'followed_id' => $user->id,
                ],
                [
                    'score_type' => 'follow',
                    'scores'     => 0,
                    'used'       => 0,
                ]
            );

            return $this->unfollow($user);
        } else {

            $this->follow($user);
            // add scores to the user
            $this->scores()->updateOrCreate(
                [
                    'user_id' => $this->id,
                    'followed_id' => $user->id,
                ],
                [
                    'score_type' => 'follow',
                    'scores'     => 1,
                    'used'       => 0,
                ]
            );
        }
    }

    public function following(User $user)
    {

        return $this->follows()->where('following_user_id', $user->id)->exists();
    }
}
