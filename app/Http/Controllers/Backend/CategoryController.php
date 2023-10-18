<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        $categories = Category::all();
        return view('backend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Add(CategoryRequest $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $dosyaadi = $request->name;
            $path = '/images/category/';
            $imgurl =imageupload($image,$dosyaadi,$path);
        }

        Category::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'slug'=> $request->slug,
            'sub_category'=> $request->sub_category,
            'image'=>$imgurl ?? null
        ]);
        return redirect()->route('panel/category/Index')->withSuccess('success added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Edit(string $id)
    {
        $category = Category::find($id);
        $subcategory = Category::get();
        return view('backend.pages.category.create', compact('category','subcategory'));
    }
    public function Delete(string $id)
    {
        $category = Category::find($id);
        deletefile($category->image);
        $category->delete();
        return back()->withSuccess('success deleted');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        deletefile($category->image);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $dosyaadi = $request->name;
            $path = '/images/category/';
            $imgurl =imageupload($image,$dosyaadi,$path);
        }
        Category::where('id',$id)->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'slug'=> $request->slug,
            'sub_category'=> $request->sub_category,
            'image'=>$imgurl ?? null
        ]);
        return redirect()->route('panel/category/Index')->withSuccess('success updated');
    }
}
