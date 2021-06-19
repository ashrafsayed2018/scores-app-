<ul>
    @foreach ($replies as $reply)
    <li class="">
        <span class="ml-5 inline-block">{{ $reply->created_at->diffForHumans(null,true) }}</span>

         <strong>{{ $reply->user->username }}</strong>

         <p class="font-semibold text-green-400 mr-6">{{ $reply->comment }}</p>

    </li>
    @endforeach

</ul>
