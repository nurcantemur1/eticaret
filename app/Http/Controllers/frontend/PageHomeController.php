<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageHomeController extends Controller
{
   /**
    * Summary of index
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    */
   public function Home(){
    return view('frontend.pages.index');
   }
}
