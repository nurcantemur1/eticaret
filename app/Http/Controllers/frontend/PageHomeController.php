<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class PageHomeController extends Controller
{
   /**
    * Summary of index
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    */
   public function Home(){
     $slider = Slider::where('status','1')->first();
    // $slider
    $categories = Category::get();
    return view('frontend.pages.index',compact('slider','categories'));
   }
}
