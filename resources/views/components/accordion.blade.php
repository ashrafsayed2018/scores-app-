<div class="accordion hidden xl:block max-w-sm shadow-lg h-80 rounded-sm overflow-hidden mt-5 bg-gray-100 flex-1">
    @foreach ($categories as $category)
    <div class="category">
        <input type="radio" name="category_accordion" id="{{ $category->slug }}" class="accordion__input">
        <label for="{{ $category->slug }}" class="accordion__label
        py-4 px-5 block
        text-black transition
        duration-200
        hover:bg-gray-200
        font-bold relative
        ">
        {{ $category->name }}
        <i class="fa fa-angle-down absolute left-5 top-1/2 transform -translate-y-1/2"></i>
       </label>
        @if ($category->subcategories->count() > 0)
        <div class="accordion__content py-4 px-5">
            <ul>
                @foreach ($category->subcategories as $subcategory)
                    <li>
                        <a href="">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        @endif
    </div>
    @endforeach

</div>

