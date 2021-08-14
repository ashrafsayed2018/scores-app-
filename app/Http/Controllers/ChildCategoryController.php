<?php

namespace App\Http\Controllers;

use App\ChildCategory;
use App\SubCategory;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        return view("childcategory.create", compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'name' => 'required|string|unique:child_categories|min:3',
            'description' => 'required|string|unique:child_categories|min:3',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'sub_category_id' => 'required'
        ]);

        if ($request->hasFile('image')) {

            $file = $request->image;

            $image = rand(1, 1000000000) . $file->extension();

            $request->image->storeAs('child_category_images', $image, 'public');
        }

        $attributes['image'] = $image;
        $attributes['slug'] = make_slug($request->name);

        ChildCategory::create($attributes);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $childcategory = ChildCategory::where('slug', $slug)->first();

        return view('childcategory.show', compact('childcategory'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
