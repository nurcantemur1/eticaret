<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ImageResize;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Create()
    {
        return view('backend.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Add(Request $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $dosyaadi = $request->name;
            $path = '/images/slider/';
            $imgurl =imageupload($image,$dosyaadi,$path);
        }

        Slider::create([
            'name'=> $request->name,
            'content'=> $request->content,
            'link'=> $request->link,
            'status'=> $request->status,
            'image'=>$imgurl ?? null
        ]);
        return back()->withSuccess('success added');
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
        $slider = Slider::find($id);
        return view('backend.pages.slider.create', compact('slider'));
    }
    public function Delete(string $id)
    {
        $slider = Slider::find($id);
        deletefile($slider->image);
        $slider->delete();
        return back()->withSuccess('success deleted');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        deletefile($slider->image);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $dosyaadi = $request->name;
            $path = '/images/slider/';
            $imgurl =imageupload($image,$dosyaadi,$path);
        }
        Slider::where('id',$id)->update([
            'name'=> $request->name,
            'content'=> $request->content,
            'link'=> $request->link,
            'status'=> $request->status,
            'image'=>$imgurl ?? null
        ]);
        return redirect()->route('panel/Slider/Index')->withSuccess('success updated');
    }

}
