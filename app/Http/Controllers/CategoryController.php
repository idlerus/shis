<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.categories', [
            'Categories' => Category::all()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function adminIndex()
    {
        return view('admin.categories', [
            'Categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.category-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name
        ]);

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function show(Category $category, Request $request)
    {
        $products = $category->Products()->orderBy('products.id', 'desc');

        $tags  = $request->input('tags');
        $brand = $request->input('brand');
        $name  = $request->input('name');

        if($tags !== null)
        {
            $products = $products->join('product_tag', 'products.id', '=', 'product_tag.product_id')->whereIn('product_tag.tag_id', $tags);
        }
        if($brand !== null)
        {
            $products = $products->where('products.brand', 'like', '%'.$brand.'%');
        }
        if($name !== null)
        {
            $products = $products->where('products.name', 'like', '%'.$name.'%');
        }

        if(!Auth::user()->hasPermission('moderator'))
        {
            $products = $products->where('products.published', '=', '1');
        }

        $productsArr = $category->Products()->pluck('id')->all();
        $tags = [];

        foreach($productsArr as $prod)
        {
            $tags[] = $prod;
        }

        return view('category.show', [
            'category' => $category,
            'products' => $products->paginate(10),
            'tags'     => $category->Tags(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return bool|Application|RedirectResponse|Redirector
     */
    public function destroy(Category $category)
    {
        if($category->id !== 1)
        {
            $category->delete();
            return redirect('/admin/categories')->withSuccess(__('admin.categoryRemoved'));
        }
        else
            return redirect('/admin/categories')->withErrors([__('admin.categoryCannotRemove')]);
    }
}
