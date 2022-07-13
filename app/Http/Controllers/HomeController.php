<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the homepage with the list of product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(6);

        return view('welcome', ['products' => $products]);
    }

    /**
     * Show the homepage with the products filtered
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filterProduct(string $filters)
    {
        if ($filters == 'solde'){

            $products = Product::orderBy('created_at', 'desc')->where('discount', 'solde')->paginate(6);

            return view('welcome', ['products' => $products]);

        } else if ($filters == 'Homme' || $filters == "Femme"){

            $category = Category::where('name', $filters)->get();
            $products = Product::whereBelongsTo($category)->paginate(6);

            return view('welcome', ['products' => $products]);

        } else {
            return redirect()->route('/');
        }
    }

    /**
     * Show the details of a selected product
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function productDetails($id)
    {
        $product = Product::find($id);

        return view('product', ['product' => $product]);
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('home');
    }
}
