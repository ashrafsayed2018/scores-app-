<div>
    <div class="card lg:w-full my-10">
        <div class="comment-count mb-3">{{ $count}} تعليق</div>
        @foreach($comments as $comment)
        <div class="display-comment">
            <div class="comment bg-white p-3 shadow-lg border border-b-2 border-gray-200">
                <div class="flex">
                    <div class="image ml-2">
                        <img src="{{ url($comment->user->imagePath()) }}" alt="" class="rounded-full w-8 h-8">
                    </div>
                    <div class="info">
                        <p>{{ $comment->user->username }}</p>
                        <span class="ml-5 inline-block">{{ $comment->created_at->diffForHumans(null,true) }}</span>
                    </div>
                </div>
                <div class="comment-body mr-10">
                    <p>{{ $comment->body }}</p>

                    <livewire:comment-likes :comment="$comment" :key="time().$comment->id">
                </div>
                <div class="replies_details flex">

                   @auth
                   @if ($comment->replies->count() > 0)
                   <div class="replies_count ml-3">
                       <span class="make_reply cursor-pointer" id="{{ $comment->id }}"> {{ $comment->replies->count() }}  ردود</span>
                   </div>
                    @else
                    <div>
                       <span class="make_reply cursor-pointer" id="{{ $comment->id }}">رد</span>
                    </div>
                    @endif
                    @else
                    <span class="make_reply cursor-pointer" id="{{ $comment->id }}">
                        <a href="{{ route('login') }}">رد</a>
                    </span>
                   @endauth

                </div>
            </div>
            <div class="replies bg-white p-3 shadow-lg">
                    {{-- <ul class="pr-10 reply hidden" data-id="{{ $comment->id }}"> --}}
                <div  class="pr-10 reply hidden" data-id="{{ $comment->id }}">
                        @foreach ($comment->replies as $reply)

                          <div class="border border-b-2 border-gray-200 p-3">
                              <div class="flex">
                                  <div class="image ml-2">
                                      <img src="{{ url($reply->user->imagePath()) }}" alt="" class="rounded-full w-8 h-8">
                                  </div>
                                  <div class="info">
                                      <p>{{ $reply->user->username }}</p>
                                      <span class="ml-5 inline-block">{{ $reply->created_at->diffForHumans(null,true) }}</span>
                                  </div>
                              </div>
                              <div class="reply-body mr-10">
                                  <p>{{ $reply->body }}</p>
                                  <livewire:reply-likes :reply="$reply" :key="time().$reply->id">

                              </div>
                          </div>
                        @endforeach
                        <livewire:create-reply :comment="$comment" :post="$post" :key="time().$comment->id"/>
                </div>
                    {{-- </ul> --}}
            </div>
        </div>
        @endforeach
        <hr />
    </div>
</div>
