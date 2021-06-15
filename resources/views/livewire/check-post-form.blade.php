<div>
    <h2>{{ $pages[$currentPage]['heading']}}</h2>
    <p>{{ $pages[$currentPage]['subheading'] }}</p>

    <form wire:submit.prevent="submit" method="POST" class="text-right bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 my-4" enctype="multipart/form-data">
        @csrf
        @if ($currentPage === 1)
        @if ($success)
            <div class="mb-4 bg-green-300 text-white p-2">
                {{ $success }}
            </div>
        @endif
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="title">
                عنوان المقال
              </label>
              <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
              id="title"
              type="text"
              name="title"
              value="{{ old('title') }}"
              wire:model="title"
              placeholder="عنوان المقال">

              @error('title')
              <span class="text-red-500 ">{{ $message }}</span>
              @enderror
        </div>
        @elseif ($currentPage === 2)
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="description">
               وصف المقال
              </label>
              <textarea
              class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
              id="description"
              type="text"
              name="description"
              wire:model="description"
              placeholder="وصف المقال">{{ old('description') }}</textarea>


              @error('description')

              <span class="text-red-500">{{ $message }}</span>

              @enderror
        </div>
        @elseif ($currentPage === 3)
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="images">
               صور المقال
              </label>
              <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
              id="images"
              type="file"
              name="images"
              value="{{ old('images') }}"
              wire:model="images"
              placeholder="صورة  المقال">
              <img src="{{ asset('storage/post_images', ) }}" alt="">
              @error('images')

              <span class="text-red-500">{{ $message }}</span>

              @enderror
        </div>
        @elseif ($currentPage === 4)
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="phone">
                رقم التليفون
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
              id="phone"
              type="text"
              name="phone"
              value="{{ old('phone') }}"
              wire:model="phone"
              placeholder="رقم التليفون">
              @error('phone')

              <span class="text-red-500">{{ $message }}</span>

              @enderror
        </div>
        @elseif ($currentPage === 5)
        <div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="category">
                       التصنيف
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                    id="category"
                    type="text"
                    name="category_id"
                    wire:model="selectedCategory">
                    <option value=""> اختر التصنيف</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if (old('category_id') == $category->id)
                        selected
                    @endif>{{ $category->name }}</option>

                    @endforeach
                </select>
                {{ $selectedCategory }}
                @error('category')

                <span class="text-red-500">{{ $message }}</span>

                @enderror
            </div>
                @if(!is_null($subcategories))
                        <div class="mb-4">
                                <label class="block text-grey-darker text-sm font-bold mb-2" for="subcategory">
                                    التصنينف الفرعي
                                </label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                                    id="sub_category_id"
                                    type="text"
                                    name="subcategory"
                                    wire:model="selectedSubCategory">
                                    <option value="">اختر التصنيف الفرعي</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" @if (old('subcategory_id') == $subcategory->id)
                                        selected
                                    @endif>{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory')

                                <span class="text-red-500">{{ $message }}</span>

                                @enderror
                        </div>
                @else
                 this is null
                @endif

             @if (!is_null($childcategories))
             <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="childcategory">
                       التصنيف الفرعي الثاني
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                    id="childcategory"
                    type="text"
                    name="child_category_id"
                    wire:model="selectedChildCategory">
                    <option value="">اختر التصنيف الفرعي الثاني</option>
                    @foreach ($childcategories as $childcategory)
                    <option value="{{ $childcategory->id }}" @if (old('childcategory_id') == $childcategory->id)
                        selected
                    @endif>{{ $childcategory->name }}</option>
                    @endforeach
                </select>
                @error('childcategory')

                <span class="text-red-500">{{ $message }}</span>

                @enderror
            </div>
             @endif

        </div>
        @endif

        <div class="mb-4 flex items-center justify-between">
            @if ($currentPage === 1)
                <div></div>
            @else
                <button wire:click="goToPreviousPage" class="bg-red-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    السابق
                </button>
            @endif

            @if($currentPage == count($pages))
                <button type="submit" class="bg-blue-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    حفظ
                </button>
            @else
                <button wire:click="goToNextPage" class="bg-green-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    التالي
                </button>
            @endif

        </div>
    </form>
</div>