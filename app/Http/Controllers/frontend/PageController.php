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
    public function products(Request $request)
    {
        $size = $request->size ?? null;
        $color = $request->color ?? null;
        $startPrice = $request->startPrice ?? null;
        $endPrice = $request->endPrice ?? null;


        $products = DB::table('products')->where(function ($result) use ($size, $color,$startPrice,$endPrice) {
            if (!empty($size)) {
                $result->where('size', $size);
            }
            if (!empty($color)) {
                $result->where('color', $color);
            }
            if (!empty($startPrice) && $endPrice) {
                $result->wherebetween('price', [$startPrice,$endPrice]);
            }
        })->paginate(3);
         $categories= Category::where('sub_category')->with('items')->get();

        return view('frontend.pages.products', compact('products','categories'));
    }
    public function productdetail($id)
    {
        $product = Product::where('id', $id)->first();
        return view('frontend.pages.productdetail', compact('product'));
    }
    public function thankyou()
    {
        return view('frontend.pages.thankyou');
    }
    public function cart()
    {
        return view('frontend.pages.cart');
    }
    public function productsWoman()
    {
        return view('frontend.pages.products');
    }
    public function productsChildren()
    {
        return view('frontend.pages.products');
    }
    public function productsMen()
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
