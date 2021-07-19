<div class="post_info col-span-2 bg-white rounded-lg shadow-lg p-5">
    <div class="top_info mt-5">
         <h2 class="post_title mb-5 text-2xl">{{ $post->title }}</h2>
         <div class="views_count_and_publish_date flex jsutify-between align-center">
             <div class="views_count w-1/2 flex items-start">
                <i class="far fa-eye text-gray-400 text-2xl ml-4"></i>
                <span class="count">{{ $post->view_count }} مشاهدات</span>
             </div>
             <div class="publish_date flex items-start">
                <i class="far fa-clock text-gray-400 text-2xl ml-4"></i>
                <span class="date">{{ $post->created_at->diffForHumans() }}</span>
             </div>
         </div>
         <div class="category_name mt-5 bg-gray-100 text-gray-500 text-center p-3 rounded-3xl">{{ $post->category->name }}</div>
    </div>
    <div class="middel_info mt-5">
       <div class="mid_info flex justify-between">
            <p class="info">معلومات</p>

            <div>
                <div class="translate_info border-2 border-blue-500 text-blue-500 font-normal hover:bg-blue-500 hover:text-white transition-all px-3 pb-1 cursor-pointer rounded-xl">ترجمه</div>
            </div>
       </div>
       <p class="post_description text-gray-600 mt-5">{{ Str::limit($post->description, $limit = 200, '...') }}</p>
    </div>
    <div class="user_info flex justify-between mt-5 bg-gray-100 p-5 -mx-5">
        <div class="user_details flex">
            <div class="user_img ml-2">
                <img src="{{ asset('storage/users_images/'. $post->user->profile->image)}}" class="w-10 h-10 rounded-full" alt="">
            </div>
            <div class="user_details_info">
                <p>{{ $post->user->name }}</p>
                <span class="text-gray-500 ">
                    <small>عضو منذ {{ $post->user->created_at->diffForHumans(null, true) }}</small>
                </span>
            </div>
        </div>
        <div>
            {{-- <div class="follow-button border-2 border-blue-500 text-blue-500 font-normal hover:bg-blue-500 hover:text-white transition-all px-5 pb-1 cursor-pointer rounded-lg">
                تابع
           </div> --}}
           <livewire:follow :user="$post->user"/>
        </div>

    </div>
    <div class="contact_info mt-5 flex justify-around lg:justify-between">
        <div class="call_button">
            <div class="profile-card__button button--green js-call-btn cursor-pointer">
                <span>اتصل الان </span>
                <i class="fa fa-phone transform rotate-90 mr-5"></i>
            </div>
        </div>
        <div class="chat_button">
            <div class="profile-card__button button--blue js-message-btn cursor-pointer">
                <span> ارسل رساله </span>
                <i class="fas fa-comment transform rotate-90 mr-5"></i>
            </div>
        </div>

    </div>
</div>
{{-- bg-gradient-to-r  flex justify-between from-yellow-800 to-yellow-600 rounded-2xl text-white sm:w-50 md:w-40 lg:w-60 px-2 md:px-2 lg:px-4 md:py-3 lg:py-4 lg:text-xl shadow-lg --}}
