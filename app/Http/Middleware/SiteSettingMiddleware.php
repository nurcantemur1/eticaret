<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $categories =DB::table('Categories')->get();
        $cat_items = Category::where('sub_category',null)->with('items')->get();
        view()->share(['categories'=>$categories,'cat_items'=>$cat_items]);

        return $next($request);
    }
}
