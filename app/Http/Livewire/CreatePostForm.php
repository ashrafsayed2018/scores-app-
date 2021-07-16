<?php

namespace App\Http\Livewire;

use App\Post;
use App\Category;
use App\SubCategory;
use App\ChildCategory;
use App\PostImage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Intervention\Image\ImageManagerStatic as Image;

class CreatePostForm extends Component
{

    use WithFileUploads;

    public $currentPage = 1;
    public $categories;
    public $subcategories;
    public $childcategories;

    // save the selected form

    public $selectedCategory = null;
    public $selectedSubCategory = null;
    public $selectedChildCategory = null;

    // form properties

    public $title;
    public $description;
    public $images = [];
    public $phone;
    public $category_id;
    public $subcategory_id;
    public $childcategory_id;




    // success message

    public $success;

    public $pages = [
       1 => [
           'heading' => 'عنوان المقال',
           'subheading' => 'اكتب عنوانا للمقال'
         ],
       2 => [
            'heading' => 'وصف المقال',
            'subheading' => 'اكتب وصفا للمقال'
         ],
       3 => [
            'heading' => 'اضف صور المقال',
            'subheading' => 'اضف المزيد من الصور للمقال'
         ],
       4 => [
            'heading' => 'رقم التليفون',
            'subheading' => 'اكتب رقم التليفون للمقال'
         ],
       5 => [
            'heading' => 'اختر تصنيف',
            'subheading' => '  اختر تصنيف مناسب للمقال'
         ],
    ];

    private $validationRules = [

            1 => [
                    'title' => ['required' , 'string','min:3','max:100'],
                ],
            2 => [
                    'description' => ['required' , 'min:3','max:500'],
                ],
            3 => [
                    'images' =>  ['required'],
                ],
            4 => [
                    'phone' =>  ['required'],
            ],
            5 => [
                    'selectedCategory' => ['required']
                ]
    ];

    // 'selectedSubCategory' => 'required',
    // 'selectedChildCategory' => 'required',


    public function updated($propertyName) {

        $this->validateOnly($propertyName, $this->validationRules[$this->currentPage]);

    }

    public function goToNextPage () {

        $this->validate($this->validationRules[$this->currentPage]);

        $this->currentPage++;
    }

    public function goToPreviousPage () {

        $this->currentPage--;
    }

    public function updatedSelectedCategory ($category_id ,$subcategory_id) {

            $this->subcategories = SubCategory::where('category_id', $category_id)->get();



            $this->updatedSelectedSubCategory($subcategory_id);

    }

    public function updatedSelectedSubCategory($subcategory_id) {

            $this->childcategories = ChildCategory::where('subcategory_id', $subcategory_id)->get();

            if($this->childcategories->count() > 0 ) {

                    $this->validationRules = collect($this->validationRules)->collapse()->toArray();

                    $this->validationRules['selectedChildCategory'] = 'required';

            }

    }

    public function storeImages () {

        $iamgeArray = [];

        if(!$this->images) {
            return;
        }

        foreach ($this->images as $image) {

         $imageName = time() . $image->getClientOriginalName();
         $imageName = str_replace(' ', '-',$imageName);
         $image->storeAs('public/post_images',$imageName);
         $imageArray[] = $imageName;
        }
        return $imageArray;
    }

    public function submit() {


        $user_id = auth()->id();
       if(UserCanPost($user_id)) {

            $images = $this->storeImages();
            $rules = collect($this->validationRules)->collapse()->toArray();
            $subcategories = SubCategory::where('category_id', $this->selectedCategory)->get();
            $childcategories = ChildCategory::where('subcategory_id', $this->selectedSubCategory)->get();
            $post = new Post();

            if($subcategories->count() == 0) {

                $post->create([
                    'user_id'    => $user_id,
                    'title'       => $this->title,
                    'slug'        => make_slug($this->title, '-'),
                    'description' => $this->description,
                    // 'images'      => $images,
                    'phone'       => $this->phone,
                    'category_id'    => $this->selectedCategory,
                ]);

            } elseif ($childcategories->count() == 0) {

            $post->create([
                'user_id'    => auth()->id(),
                'title'       => $this->title,
                'slug'        => make_slug($this->title, '-'),
                'description' => $this->description,
                // 'images'      => $images,
                'phone'       => $this->phone,
                'category_id'    => $this->selectedCategory,
                'sub_category_id' => $this->selectedSubCategory
              ]);

             } else {
            $post->create([
                        'user_id'    => auth()->id(),
                        'title'       => $this->title,
                        'slug'        =>  make_slug($this->title, '-'),
                        'description' => $this->description,
                        // 'images'      => $images,
                        'phone'       => $this->phone,
                        'category_id'    => $this->selectedCategory,
                        'sub_category_id' => $this->selectedSubCategory,
                        'child_category_id' => $this->selectedChildCategory
                    ]);
        }

        $post = Post::latest('id')->first();
        $post_id = $post->id;
        PostImage::create(
                [
                'post_id' => $post_id,
                'image' => $images
                ]
        );
        // reset the inputs
        $this->reset();
        $this->success = 'تمت اضافة المقال بنجاح !';
       } else {

       }


    }

    public function hydrate() {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render() {
        $this->categories = Category::all();

        $this->currentPage;
        return view('livewire.create-post-form');
    }
}
