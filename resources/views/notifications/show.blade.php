@extends('layouts.app')

@section('content')
    <h1 class="text-center">صفحة الاشعارات الخاصه بك</h1>
    <ul>
    @forelse ($notifications as $notification)

        @if ($notification->type === 'App\Notifications\NewLikeAdded' )
            <li>
                @if ($notification->data['user']['id']  == auth()->id())

                لقد اعجبت  باعلانك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['post_title']}}</a>
                @else

                لقد اعجب <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['username'] }}</a> باعلانك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['post_title']}}</a>
                @endif
            </li>
        @endif
    @empty
    </ul>
       <p>لا توجد اشعارات لعرضها</p>
    @endforelse
@endsection
