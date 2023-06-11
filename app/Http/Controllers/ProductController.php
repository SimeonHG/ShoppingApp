<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::denies('manage_products')) {
                abort(403);
            }
            
            return $next($request);
        });
    }

    public function index()
    {
        $user = Auth::user()->load('products');
        
        return view('products.index', compact('user'));
    }

    public function create()
    {
        $shops = Shop::all();

        return view('products.create', compact('shops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'expiration_date' => 'nullable|date',
            'shop_ids' => 'required|array',
        ]);

        $productData = $request->only(['name', 'description', 'expiration_date', 'price']);

        $product = Auth::user()->products()->create($productData);

        // Attach the product to the selected shops
        $shopIds = $request->input('shop_ids');
        $shops = Shop::whereIn('id', $shopIds)->get();
        $product->shops()->attach($shops);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }



    /**
     * Display the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        // Check if the logged-in user has the necessary permission to edit the product
        if (!auth()->user()->hasPermissionTo('manage_products')) {
            return redirect()->route('products.index')
                ->with('error', 'You do not have permission to edit this product.');
        }

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        // Check if the logged-in user has the necessary permission to edit the product
        if (!auth()->user()->hasPermissionTo('manage_products')) {
            return redirect()->route('products.index')
                ->with('error', 'You do not have permission to edit this product.');
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        // Check if the logged-in user has the necessary permission to delete the product
        if (!auth()->user()->hasPermissionTo('manage_products')) {
            return redirect()->route('products.index')
                ->with('error', 'You do not have permission to delete this product.');
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function buyProduct(Request $request, Product $product)
    {
        $user = auth()->user();

        $user->bought_products()->attach($product);

        return redirect()->back();
    }

    public function cart()
    {
        $user = auth()->user();
        $boughtProducts = $user->bought_products;
        $banks = $user->banks;

        return view('products.cart', compact('boughtProducts', 'banks'));
    }

    public function finish()
    {
        $user = auth()->user();
        $user->bought_products()->detach();

        return redirect()->route('products.index'); 
    }
}
