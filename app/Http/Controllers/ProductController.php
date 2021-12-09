<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
            'products' => Product::paginate(10)
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
        $rating = $product->Ratings()->where('user_id', '=', Auth::id())->get();
        if($rating->isEmpty())
            $rating = 0;
        else
            $rating = $rating[0]->rating;
        return view('products.show', [
            'product' => $product,
            'comments' => $product->Comments()->orderBy('created_at', 'DESC')->paginate(5),
            'rating' => $rating
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
     * @return RedirectResponse
     */
    public function publish(Product $product): RedirectResponse
    {
        $product->published = 1;
        $product->save();

        return Redirect::back();
    }

    /**
     * Show the list for publishing products for administration.
     */
    public function indexPublishAdmin()
    {
        return view('admin.products-publish', [
            'products' => Product::where('published', '=', '0')->paginate(10)
        ]);
    }

    /**
     * Creates comment for product
     *
     * @return RedirectResponse
     */
    public function commentCreate(Request $request, Product $product): RedirectResponse
    {
        Comment::create([
            'comment'    => $request->comment,
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
        ]);

        return back();
    }

    /**
     * Creates comment for product
     *
     * @return RedirectResponse
     */
    public function rating(Request $request, Product $product): RedirectResponse
    {
        if ($request->rating !== null && $request->rating < 0 && $request->rating > 5)
        {
            return back()->withErrors(__('product.invalidRating'));
        }

        $rating = Rating::where('user_id', '=', Auth::id())->where('product_id', '=', $product->id)->get();
        if($rating->isEmpty())
        {
            Rating::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'rating' => $request->rating
            ]);
        }
        else
        {
            $rating[0]->rating = $request->rating;
            $rating[0]->save();
        }
        return back();
    }
}
