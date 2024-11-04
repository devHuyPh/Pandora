<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Variant;
use App\Http\Requests\StoreVariantRequest;
use App\Http\Requests\UpdateVariantRequest;
use App\Models\Attibute;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//     const PATH_VIEW='variants.';
//     public function index()
//     {
//         $variants = Variant::with('product', 'attributeValues')->get();
//         return view(self::PATH_VIEW.__FUNCTION__, compact('variants'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         $products = Product::all();
//         $attributeValues = AttributeValue::all();
//         return view(self::PATH_VIEW.__FUNCTION__, compact('products', 'attributeValues'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(StoreVariantRequest $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Variant $variant)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Variant $variant)
//     {
//         return view(self::PATH_VIEW.__FUNCTION__);
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(UpdateVariantRequest $request, Variant $variant)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Variant $variant)
//     {
//         //
//     }
// }

public function index(Product $product)
    {
        $variants = $product->variants;
        return view('variants.index', compact('product', 'variants'));
    }

    public function create(Product $product)
    {
        $attributes = Attibute::with('values')->get(); // Lấy các attribute và giá trị của chúng
        return view('variants.create', compact('product', 'attributes'));
    }

    public function store(StoreVariantRequest $request, Product $product)
    {
        $validated = $request->validate([
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'attribute_values' => 'required|array',
        ]);

        $variant = $product->variants()->create([
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
        ]);

        $variant->attributeValues()->attach($validated['attribute_values']);

        return redirect()->route('products.variants.index', $product->id)->with('success', 'Variant created successfully!');
    }

    public function show(Product $product, Variant $variant)
    {
        return view('variants.show', compact('product', 'variant'));
    }

    public function edit(Product $product, Variant $variant)
    {
        $attributes = Attibute::with('values')->get();
        return view('variants.edit', compact('product', 'variant', 'attributes'));
    }

    public function update(UpdateVariantRequest $request, Product $product, Variant $variant)
    {
        $validated = $request->validate([
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'attribute_values' => 'required|array',
        ]);

        $variant->update([
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
        ]);

        $variant->attributeValues()->sync($validated['attribute_values']);

        return redirect()->route('products.variants.index', $product->id)->with('success', 'Variant updated successfully!');
    }

    public function destroy(Product $product, Variant $variant)
    {
        $variant->delete();
        return redirect()->route('products.variants.index', $product->id)->with('success', 'Variant deleted successfully!');
    }
}