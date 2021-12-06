<?php

namespace App\Http\Middleware;
use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoriesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        View::share('categories', Category::all());
        return $next($request);
    }
}
