<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();

        return view('shops.index', compact('shops'));
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        Shop::create($validatedData);

        return redirect()->route('shops.index')->with('success', 'Shop created successfully.');
    }

    public function show(Shop $shop)
    {
        $shop->load('products');

        return view('shops.show', compact('shop'));
    }


    public function edit(Shop $shop)
    {
        return view('shops.edit', compact('shop'));
    }

    public function update(Request $request, Shop $shop)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $shop->update($validatedData);

        return redirect()->route('shops.index')->with('success', 'Shop updated successfully.');
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();

        return redirect()->route('shops.index')->with('success', 'Shop deleted successfully.');
    }
}
