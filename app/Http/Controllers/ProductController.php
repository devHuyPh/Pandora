<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attibute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const PATH_VIEW = 'admin.products.';

    /**
     * Hiển thị danh sách sản phẩm.
     */
    public function index()
    {
        $products = Product::all();
        return view(self::PATH_VIEW . 'index', compact('products'));
    }

    /**
     * Hiển thị form tạo sản phẩm mới.
     */
    public function create()
    {
        $attributes = Attibute::with('values')->get();
        $categories = Category::all();
        return view(self::PATH_VIEW . 'create', compact('attributes', 'categories'));
    }

    /**
     * Lưu sản phẩm mới.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        // Tạo sản phẩm mới
        $product = Product::create($validated);

        // Xử lý ảnh nếu có tải lên
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');
            $product->update(['image_path' => $path]);
        }

        // Tạo các biến thể cho sản phẩm
        if (isset($validated['variants'])) {
            foreach ($validated['variants'] as $variantData) {
                $variant = $product->variants()->create([
                    'price' => $variantData['price'],
                    'quantity' => $variantData['stock'],
                ]);
                $variant->attributeValues()->attach($variantData['attribute_values']);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Hiển thị thông tin chi tiết sản phẩm.
     */
    public function show(Product $product)
    {
        $variants = $product->variants;
        return view(self::PATH_VIEW . 'show', compact('product', 'variants'));
    }

    /**
     * Hiển thị form cập nhật sản phẩm.
     */
    public function edit(Product $product)
    {
        $attributes = Attibute::with('values')->get();
        $categories = Category::all();
        return view(self::PATH_VIEW . 'edit', compact('product', 'attributes', 'categories'));
    }

    /**
     * Cập nhật sản phẩm.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->update($validated);

        // Xử lý ảnh nếu có tải lên
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');
            $product->update(['image_path' => $path]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Xóa sản phẩm.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
