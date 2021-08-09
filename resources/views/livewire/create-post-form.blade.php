<div>
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentPage != 1 ? 'btn-default' : 'button-green text-white' }}">1</a>
                <p>عنوان الاعلان</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentPage != 2 ? 'btn-default' : 'button-green text-white' }}">2</a>
                <p>وصف الاعلان</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentPage != 3 ? 'btn-default' : 'button-green text-white' }}" disabled="disabled">3</a>
                <p> تصنيف الاعلان</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentPage != 4 ? 'btn-default' : 'button-green text-white' }}" disabled="disabled">4</a>
                <p>صور الاعلان</p>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="submit" method="POST" class="text-right bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 my-4" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
        @csrf
        @if ($success)
        <div class="mb-4 bg-green-300 text-white p-2">
            {{ $success }}
        </div>
        @endif


        @if ($currentPage === 1)
        <div class="row setup-content {{ $currentPage != 1 ? 'displayNone' : '' }}" id="step-1">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="title">
                    عنوان الاعلان
                </label>
                <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                id="title"
                type="text"
                value="{{ old('title') }}"
                wire:model.lazy="title"
                placeholder="وصف الاعلان">

                @error('title')
                <span class="text-red-500 ">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @elseif ($currentPage === 2)
        <div class="row setup-content {{ $currentPage != 2 ? 'displayNone' : '' }}" id="step-2">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="description">
                وصف الاعلان
                </label>
                <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                id="description"
                type="text"
                wire:model.lazy="description"
                placeholder="وصف الاعلان">{{ old('description') }}</textarea>
                @error('description')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @elseif ($currentPage === 3)
        <div class="row setup-content {{ $currentPage != 3 ? 'displayNone' : '' }}" id="step-5">
            <div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="category">
                        التصنيف
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                        id="category"
                        type="text"
                        wire:model="selectedCategory"
                        required>
                        <option value=""> اختر التصنيف</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id') == $category->id)
                            selected
                        @endif>{{ $category->name }}</option>

                        @endforeach
                    </select>
                    @error('selectedCategory')

                    <span class="text-red-500">{{ $message }}</span>

                    @enderror
                    @if ($images)
                    @endif
                </div>
                @if(!empty($subcategories) && $subcategories->count() > 0)
                    <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="subcategory">
                                التصنينف الفرعي
                            </label>
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                                id="sub_category_id"
                                wire:model="selectedSubCategory"
                                required>
                                <option value="">اختر التصنيف الفرعي</option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" @if (old('subcategory_id') == $subcategory->id)
                                    selected
                                @endif>{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedSubCategory')

                            <span class="text-red-500">{{ $message }}</span>

                            @enderror
                    </div>
                @endif

                @if (!empty($childcategories) && $childcategories->count() > 0)
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="childcategory">
                        التصنيف الفرعي الثاني
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                        id="childcategory"
                        type="text"
                        required
                        wire:model="selectedChildCategory" >
                        <option value="" hidden disabled selected>اختر التصنيف الفرعي الثاني</option>
                        @foreach ($childcategories as $childcategory)
                        <option value="{{ $childcategory->id }}" @if (old('childcategory_id') == $childcategory->id)
                            selected
                        @endif>{{ $childcategory->name }}</option>
                        @endforeach
                    </select>
                    @error('selectedChildCategory')

                    <span class="text-red-500">{{ $message }}</span>

                    @enderror
                </div>
                @endif

            </div>
        </div>
        @elseif ($currentPage === 4)
        <div class="row setup-content {{ $currentPage != 4 ? 'displayNone' : '' }}" id="step-3">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="images">
                صور الاعلان
                </label>
                <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                id="images"
                type="file"
                multiple
                value="{{ old('images') }}"
                wire:model="images"
                placeholder="صور الاعلان"  accept="image/*">

                @error('image_error')

                <span class="text-red-500">{{ $message }}</span>

                @enderror

            </div>
        </div>
        @endif

        <div class="mb-4 flex items-center justify-between">
            @if ($currentPage === 1)

                <button wire:click="goToNextPage" class="bg-green-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    التالي
                </button>

                <div></div>

            @elseif ($currentPage != 1 && $currentPage != count($pages))
            <button wire:click="goToNextPage" class="bg-green-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                التالي
            </button>
                <button wire:click="goToPreviousPage" class="bg-red-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    السابق
                </button>
            @endif

            @if($currentPage == count($pages))
                <button type="submit" class="bg-blue-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    حفظ
                </button>
                <button wire:click="goToPreviousPage" class="bg-red-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    السابق
                </button>
            @endif

        </div>
    </form>
</div>
