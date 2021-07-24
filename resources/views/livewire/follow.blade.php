<div>
    @auth
    @if(current_user()->id != $user->id)
        <form wire:submit.prevent="store()">
            <button type="submit" class="{{ !current_user()->following($user) ? 'profile-card__button button--blue' : 'profile-card__button button--orange'}}">
                {{ current_user()->following($user) ? ' الغاء المتابعه ' : 'متابعه' }}
            </button>
        </form>
    @endif
    @else
    <button>
        <a href="{{ route('login') }}" class="profile-card__button button--blue">متابعه</a>
    </button>
    @endauth

</div>

{{-- follow-button border-2 border-blue-500 text-blue-500 font-normal hover:bg-blue-500 hover:text-white transition-all px-5 pb-1 cursor-pointer rounded-lg --}}
