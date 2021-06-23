<?php

namespace App\Http\Livewire;

use App\Followable;
use Livewire\Component;

class Follow extends Component
{

    use Followable;
    // public $profile;
    public $user;
    public function render()
    {
        return view('livewire.follow');
    }

    public function store()
    {

      $user = $this->user;
        auth()
        ->user()
         ->toggleFollow($user);

     return back();
    }
}
