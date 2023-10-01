<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact(){
        return view('frontend.pages.contact');
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function products(){
        return view('frontend.pages.products');
    }
    public function productdetail(){
        return view('frontend.pages.productdetail');
    }
    public function thankyou(){
        return view('frontend.pages.thankyou');
    }
}
