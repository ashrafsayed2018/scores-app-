<div>
    @if(current_user()->id != $user->id)
    <form wire:submit.prevent="store()">
      <button type="submit" class="button {{ !current_user()->following($user) ? 'button-green' : 'button-blue'}}">
        {{ current_user()->following($user) ? ' الغاء المتابعه ' : 'متابعه' }}
      </button>
    </form>

  @endif
</div>
