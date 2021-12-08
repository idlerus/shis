<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        $newProduct = Product::create([
            'name' => $request->name,
            'shortDesc' => $request->shortDesc,
            'fullDesc' => $request->fullDesc,
            'brand' => $request->brand,
            'country' => $request->country,
            'category_id' => $request->category,
            'created_by_user_id' => Auth::id(),
        ]);

        $newProduct->Tags()->attach(array_values($request->tags));

        return redirect('products/' . $newProduct->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
                            'name' => $request->name,
                            'shortDesc' => $request->shortDesc,
                            'fullDesc' => $request->fullDesc,
                            'brand' => $request->brand,
                            'country' => $request->country,
                            'category_id' => $request->category
                        ]);
        if ($request->tags !== null)
        {
            $diff = array_values(array_diff($product->Tags()->pluck('tag_id')->all(), $request->tags));
            $product->Tags()->detach($diff);
            $product->Tags()->attach(array_values($request->tags));
        }

        return redirect('products/' . $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }

    /**
     * Publishes the product to public
     *
     * @param Product $product
     * @return Application|Redirector|RedirectResponse
     */
    public function publish(Product $product)
    {
        $product->published = 1;
        $product->save();

        return redirect('/category/'.$product->category_id);
    }


    /**
     * Show the list for publishing products for administration.
     */
    public function indexPublishAdmin()
    {
        return view('admin.products-publish', [
            'products' => Product::all()
        ]);
    }
}
