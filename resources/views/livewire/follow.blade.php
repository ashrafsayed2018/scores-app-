<div>
    @auth
    @if(current_user()->id != $user->id)
        <form wire:submit.prevent="store()">
            <button type="submit" class="button {{ !current_user()->following($user) ? 'button-green' : 'button-blue'}}">
                {{ current_user()->following($user) ? ' الغاء المتابعه ' : 'متابعه' }}
            </button>
        </form>
    @endif
    @else
     <a href="{{ route('login') }}" class="button button-blue">متابعه</a>
    @endauth

</div>
