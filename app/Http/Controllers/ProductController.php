<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();

        return view('admin.products.create', compact('categories','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $validated = $request->validated();

        $product = Product::create($validated);

        $product->sizes()->sync($request->sizes);

        if(!empty($request->picture)){

            $path = $request->file('picture')->move('images', $product->name . '_picture.' . $request->file('picture')->extension());

            $product->picture()->create([
                'path' => $path
            ]);
        }

        return redirect()
            ->route('products.index')
            ->with('message', 'Le produit a été crée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $sizes = Size::all();

        $productSizes = ($product->sizes)->pluck('id')->toArray();

        return view('admin.products.edit', compact('product', 'categories', 'sizes', 'productSizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ProductUpdateRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        $validated = $request->validated();

        $product->update($validated);

        $product->sizes()->sync($request->sizes);

        if(!empty($request->picture)){

            Storage::delete($product->picture->path);

            $path = $request->file('picture')->move('images', $product->name . '_picture.' . $request->file('picture')->extension());

            $product->picture()->update([
                'path' => $path
            ]);
        }

        return redirect()
            ->route('products.index')
            ->with('message', 'Le produit a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('message','Le produit a été supprimé');
    }
}
