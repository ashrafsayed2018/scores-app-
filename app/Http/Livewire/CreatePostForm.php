<?php

namespace App\Http\Livewire;

use App\Post;
use App\Category;
use App\PostImage;
use App\SubCategory;
use App\ChildCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

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
    public $images;
    public $category_id;
    public $subcategory_id;
    public $childcategory_id;

    // success message

    public $success;
    public $image_error;


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
            'heading' => 'اختر تصنيف',
            'subheading' => '  اختر تصنيف مناسب للمقال'
        ],
        4 => [
            'heading' => 'اضف صور المقال',
            'subheading' => 'اضف المزيد من الصور للمقال'
        ],
    ];

    private $validationRules = [

        1 => [
            'title' => ['required', 'unique:posts', 'string', 'min:3', 'max:100'],
        ],
        2 => [
            'description' => ['required', 'min:3', 'max:500'],
        ],
        3 => [
            'selectedCategory' => ['required'],
            "selectedSubCategory" => ['required_with:selectedCategory'],
            'selectedChildCategory' => ['required_with:selectedSubCategory'],
        ],
        4 => [
            'images' => ['required', 'image', 'max:2']
        ]
    ];

    protected $messages = [
        'title.required' => 'عنوان الاعلان مطلوب',
        'title.unique' => 'عنوان الاعلان موجود من قبل',
        'description.required' => 'وصف الاعلان مطلوب',
        'selectedCategory.required_with' => 'الفئه الرئيسيه مطلوبه',
        'selectedSubCategory.required_with' => 'الفئه الفرعيه مطلوبه',
        'selectedChildCategory.required_with' => 'الفئه تحت الفرعيه مطلوبه',
        'images.required' => 'صورة الاعلان مطلوبه',
    ];


    public function updated($propertyName)
    {

        $this->validateOnly($propertyName, $this->validationRules[$this->currentPage]);
    }

    public function goToNextPage()
    {

        $this->validate($this->validationRules[$this->currentPage]);

        $this->currentPage++;
    }

    public function goToPreviousPage()
    {

        $this->currentPage--;
    }

    public function updatedSelectedCategory($category_id, $subcategory_id)
    {

        $this->subcategories = SubCategory::where('category_id', $category_id)->get();

        $this->updatedSelectedSubCategory($subcategory_id);
    }

    public function updatedSelectedSubCategory($subcategory_id)
    {

        $this->childcategories = ChildCategory::where('sub_category_id', $subcategory_id)->get();

        if ($this->childcategories->count() > 0) {

            $this->validationRules = collect($this->validationRules)->collapse()->toArray();

            $this->validationRules['selectedChildCategory'] = ['required'];
        }
    }

    public function storeImages()
    {



        if (!$this->images) {
            return;
        }

        if (count($this->images) <= 4) {
            $iamgeArray = [];
            $allowed_extensions = ['png', 'jpg', 'jpeg', 'gif'];
            foreach ($this->images as $image) {

                $image_extension = $image->getClientOriginalExtension();
                if (in_array($image_extension, $allowed_extensions)) {



                    //  create image name

                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $imageName = str_replace(' ', '-', $imageName);

                    // the destionation to save the image
                    $destinationPath = public_path('storage/post_images/');

                    // preparing image for resize
                    $image_resize =  Image::make($image->getRealPath());

                    // image resize and save

                    $resizedImage = $image_resize->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    // dd($resizedImage->filesize());
                    // add the text watermark
                    $resizedImage->text('ashraf', 450, 450, function ($font) {
                        $font->size(200);
                        $font->color('#0000ff');
                        $font->align('right');
                        $font->valign('bottom');
                    })->save($destinationPath . $imageName);

                    $imageArray[] = $imageName;
                } else {
                    return;
                }
            }

            return $imageArray;
        }
    }

    public function submit()
    {

        $user_id = auth()->id();
        if (UserCanPost($user_id) && $this->storeImages()) {

            $images = $this->storeImages();
            $rules = collect($this->validationRules)->collapse()->toArray();
            $subcategories = SubCategory::where('category_id', $this->selectedCategory)->get();
            $childcategories = ChildCategory::where('sub_category_id', $this->selectedSubCategory)->get();
            $post = new Post();

            if ($subcategories->count() == 0) {

                $post->create([
                    'user_id'    => $user_id,
                    'title'       => $this->title,
                    'slug'        => make_slug($this->title, '-'),
                    'description' => $this->description,
                    'phone'       => auth()->user()->profile->phone,
                    'category_id'    => $this->selectedCategory,
                ]);
            } elseif ($childcategories->count() == 0) {

                $post->create([
                    'user_id'    => auth()->id(),
                    'title'       => $this->title,
                    'slug'        => make_slug($this->title, '-'),
                    'description' => $this->description,
                    'phone'       => auth()->user()->profile->phone,
                    'category_id'    => $this->selectedCategory,
                    'sub_category_id' => $this->selectedSubCategory
                ]);
            } else {
                $post->create([
                    'user_id'    => auth()->id(),
                    'title'       => $this->title,
                    'slug'        =>  make_slug($this->title, '-'),
                    'description' => $this->description,
                    'phone'       => auth()->user()->profile->phone,
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
            $this->addError('image_error', '  حجم الصور المسموح بها 8mg عدد الصور المسموح بها لا يزيد عن 4 صور الصور jpg, png, jpeg,gif');
        }
    }

    public function hydrate()
    {
        // $this->resetErrorBag();
        // $this->resetValidation();
    }

    public function render()
    {
        $this->categories = Category::all();

        $this->currentPage;
        return view('livewire.create-post-form');
    }
}
