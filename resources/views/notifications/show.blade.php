@extends('layouts.app')

@section('content')
<h1 class="text-center mt-6">صفحة الاشعارات الخاصه بك</h1>

    <div class="grid grid-cols-8">
        <div class="col-span-2 h-4 bg-teal-400"></div>
        <ul class="col-span-4">
            @forelse ($notifications as $notification)

                @if ($notification->type === 'App\Notifications\NewLikeAdded' )
                    <li>
                        @if ($notification->data['user']['id']  != auth()->id() && $notification->data['likeable_type'] == "App\\Comment")

                        لقد اعجب <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> بتعليقك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['likeable_body']}}</a>
                        @elseif ($notification->data['user']['id']  != auth()->id() && $notification->data['likeable_type'] == "App\\Post")
                        لقد اعجب <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> باعلانك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['likeable_title']}}</a>
                        @endif
                    </li>
                @endif
                @if ($notification->type === 'App\Notifications\NewCommentAdded' )
                    <li>
                        @if ($notification->data['user']['id']  != auth()->id())
                        لقد علق <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> على اعلانك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['post_title']}}</a>
                        @endif
                    </li>
                @endif
                @if ($notification->type === 'App\Notifications\NewFavouriteAdded' )
                    <li>
                        @if ($notification->data['user']['id']  != auth()->id())
                        لقد اضاف <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a>   اعلانك للمفضله <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['favouriteable_title']}}</a>
                        @endif
                    </li>
                @endif
                @if ($notification->type === 'App\Notifications\NewReplyAdded' )
                    <li>
                        @if ($notification->data['comment_user_id']  == auth()->id())
                        لقد اضاف رد <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> على تعليقك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['comment_body']}}</a>
                        @endif
                    </li>
                @endif

                @if ($notification->type === 'App\Notifications\NewFollower' )
                <li>

                    لقد بدأ  <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> بمتابعتك

                </li>
                @endif
            @empty
            <li>لا توجد اشعارات لعرضها</li>
        </ul>
            @endforelse
    </div>
    <div class="col-span-2 h-4 bg-teal-400"></div>

@endsection
