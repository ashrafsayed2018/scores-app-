<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Notifications\NewFavouriteAdded;
use Illuminate\Support\Facades\Notification;

class PostFavourite extends Component
{

    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function store()
    {

        $this->post->addFavorite();
        $this->post->user->notify(new NewFavouriteAdded($this->post, auth()->user(), $this->post));
    }

    public function destroy()
    {


        // remove from the favourite table
        $this->post->removeFavorite();

        // remove from notifications table

        $post_favorite_notifications = auth()->user()->notifications()
            ->whereJsonContains('data->favouriteable_id', $this->post->id)->get();
        foreach ($post_favorite_notifications as $notification) {
            $notification->delete();
        }
    }

    public function render()
    {
        return view('livewire.post-favourite');
    }
}
