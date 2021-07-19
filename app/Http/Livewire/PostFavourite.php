<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Notifications\NewFavouriteAdded;

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
        $this->post->removeFavorite();
    }

    public function render()
    {
        return view('livewire.post-favourite');
    }
}
