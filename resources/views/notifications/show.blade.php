@extends('layouts.app')

@section('content')
    <h1 class="text-center my-6 lg:text-3xl">صفحة الاشعارات الخاصه بك</h1>
    <div class="grid grid-cols-8">
        <div class="hidden lg:flex col-span-2 h-4 bg-teal-400">

        </div>
        <div class="lg:col-span-4 xs:col-span-8">
            @forelse ($notifications as $notification)
                @if ($notification->type === 'App\Notifications\NewLikeAdded' )

                        @if ($notification->data['user']['id']  != auth()->id() && $notification->data['likeable_type'] == "App\\Comment")
                        <div class="bg-green-100  border-2 hover:border-green-400 py-7 xs:text-sm px-3 mb-3 flex rounded-lg justify-center items-center gap-x-2">
                                 اعجب <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> بتعليقك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['likeable_body']}}</a>
                        </div>
                        @elseif ($notification->data['user']['id']  != auth()->id() && $notification->data['likeable_type'] == "App\\Post")
                            <div class="bg-green-100  border-2 hover:border-green-400 py-7  xs:text-sm px-3 mb-3 flex rounded-lg justify-center items-center gap-x-2">
                                 اعجب <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> باعلانك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['likeable_title']}}</a>
                        </div>
                        @endif

                @endif
                @if ($notification->type === 'App\Notifications\NewCommentAdded' )


                            @if ($notification->data['user']['id']  != auth()->id())
                            <div class="bg-green-100  border-2 hover:border-green-400 py-7  xs:text-sm px-3 mb-3 flex rounded-lg justify-center items-center gap-x-2">
                             علق <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> على اعلانك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['post_title']}}</a>
                             </div>
                            @endif

                @endif
                @if ($notification->type === 'App\Notifications\NewFavouriteAdded' )


                        @if ($notification->data['user']['id']  != auth()->id())
                        <div class="bg-green-100  border-2 hover:border-green-400 py-7  xs:text-sm px-3 mb-3 flex rounded-lg justify-center items-center gap-x-2">
                         اضاف <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a>   اعلانك للمفضله <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['favouriteable_title']}}</a>
                        </div>
                        @endif

                @endif
                @if ($notification->type === 'App\Notifications\NewReplyAdded' )

                        @if ($notification->data['comment_user_id']  == auth()->id())
                            <div class="bg-green-100  border-2 hover:border-green-400 py-7  xs:text-sm px-3 mb-3 flex rounded-lg justify-center items-center gap-x-2">
                             اضاف رد <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> على تعليقك <a href="{{ route('post.show',$notification->data['post_slug']) }}">{{ $notification->data['comment_body']}}</a>
                            </div>
                        @endif

                @endif
                @if ($notification->type === 'App\Notifications\NewFollower' )
                    <div class="bg-green-100  border-2 hover:border-green-400 py-7  xs:text-sm px-3 mb-3 flex rounded-lg justify-center items-center gap-x-2">


                         بدأ  <a href="{{ route('profile.show', $notification->data['user']['slug']) }}">{{ $notification->data['user']['name'] }}</a> بمتابعتك

                    </div>
                @endif
            @empty
                <div class="bg-red-100  border-2 hover:border-red-400 py-7  xs:text-sm px-3 mb-3 flex rounded-lg justify-center items-center gap-x-2">
                    <div class="bg-white p-3 rounded-md">
                        <i class="far fa-sticky-note text-4xl text-blue-400"></i>
                    </div>
                    <p class="flex-1">لا توجد اشعارات لعرضها</p>
                </div>
            @endforelse
        </div>
        <div class="hidden lg:flex col-span-2 h-4 bg-teal-400"></div>
    </div>

@endsection
