<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function products(Request $request,$slug=null)
    {
         $category = request()->segment(1) ?? null;

        $size = $request->size ?? null;
        $color = $request->color ?? null;
        $startPrice = $request->startPrice ?? null;
        $endPrice = $request->endPrice ?? null;

        $order = $request->order ?? 'id';
        $short = $request->short ?? 'desc';

        $products = Product::where(function ($result) use ($size, $color, $startPrice, $endPrice) {
            if (!empty($size)) {
                $result->where('size', $size);
            }
            if (!empty($color)) {
                $result->where('color', $color);
            }
            if (!empty($startPrice) && $endPrice) {
                $result->wherebetween('price', [$startPrice, $endPrice]);
            }
        })->with('category:id,name,slug')->whereHas('category',function($query) use($category,$slug){
            if (!empty($slug)) {
                $query->where('slug', $slug);
            }
           return $query;
        });


        $minprice = $products->min('price');
        $maxprice = $products->max('price');
        $sizeall =  DB::table('Products')->groupBy('size')->pluck('size')->toArray();
        $colorall =  DB::table('Products')->groupBy('color')->pluck('color')->toArray();



        $products = $products->orderBy($order,$short)->paginate(12);


        return view('frontend.pages.products', compact('products', 'minprice', 'maxprice',
        'sizeall', 'colorall'));
    }
    public function productdetail($id)
    {
        $product = Product::where('id', $id)->first();
        $products =Product::where('id','!=',$product->id)->where('categoryId',$product->categoryId)->limit(6)->get();
        $categoryname = Category::where('id',$product->categoryId)->value('name');
        return view('frontend.pages.productdetail', compact('product','products','categoryname'));
    }
    public function thankyou()
    {
        return view('frontend.pages.thankyou');
    }

    public function Woman()
    {
        return view('frontend.pages.products');
    }
    public function Children()
    {
        return view('frontend.pages.products');
    }
    public function Men()
    {
        return view('frontend.pages.products');
    }
    public function checkout()
    {
        return view('frontend.pages.checkout');
    }
    public function selectedItems()
    {
        return view('frontend.pages.products');
    }
}
