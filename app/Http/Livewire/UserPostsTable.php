<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserPostsTable extends Component
{

    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;



    public function render()
    {

        $user = Auth::user();

        return view('livewire.user-posts-table', [
            'posts' => Post::where('user_id', $user->id)->get(),

        ]);
    }
}
