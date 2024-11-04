<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attibute;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//     const PATH_VIEW='admin.products.';
//     public function index()
//     {
//         $products = Product::with('variants.attributeValues')->get();
//         return view(self::PATH_VIEW.__FUNCTION__, compact('products'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view(self::PATH_VIEW.__FUNCTION__);
        
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(StoreProductRequest $request)
//     {
//         $data = $request->validated;
//         Product::create($data);
//         return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Product $product)
//     {
//         $product->load('variants.attributeValues');
//         return view(self::PATH_VIEW.__FUNCTION__, compact('product'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Product $product)
//     {
        
//         return view(self::PATH_VIEW.__FUNCTION__, compact('product'));

//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(UpdateProductRequest $request, Product $product)
//     {
//         //
//         $data=$request->validated();
//         $product->update($data);
//         return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Product $product)
//     {
//         $product->delete();
//         return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa');
//     }
// }
public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        // Lấy danh sách các thuộc tính và giá trị của chúng để hiển thị trong form
        $attributes = Attibute::with('values')->get();
        $categories = Category::with('products')->get();
        return view('admin.products.create', compact('attributes','categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'variants' => 'array',
            'variants.*.price' => 'required|numeric',
            'variants.*.quantity' => 'required|integer',
            'variants.*.attribute_values' => 'required|array',
        ]);

        // Tạo sản phẩm mới
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        // Thêm các biến thể cho sản phẩm
        foreach ($validated['variants'] as $variantData) {
            $variant = $product->variants()->create([
                'price' => $variantData['price'],
                'quantity' => $variantData['quantity'],
            ]);

            // Gán các giá trị thuộc tính cho biến thể
            $variant->attributeValues()->attach($variantData['attribute_values']);
        }

        return redirect()->route('products.index')->with('success', 'Product and variants created successfully!');
    }

    public function show(Product $product)
    {
        $variants = $product->variants;
        return view('admin.products.show', compact('product', 'variants'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}