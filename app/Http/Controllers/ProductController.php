<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attibute;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function show_all()
    {
        $products = Product::with(['variants.attributeValues'])->paginate(5);
        return view('client.category', compact('products'));
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
        $validated['is_active'] ??= 0;
        $validated['is_hotdeal'] ??= 0;
        $validated['is_new'] ??= 0;
        $validated['is_showhome'] ??= 0;

        // Xử lý hình ảnh nếu có tải lên
        if ($request->hasFile('image')) {
            $validated['image'] = Storage::put('images/products', $request->file('image'));
        }
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $validated['image'],
            'price' => $validated['price'],
            'base_price' => $validated['base_price'],
            'quantity' => $validated['quantity'],
            'category_id' => $validated['category_id'],
        ]);



        // Xử lý các biến thể nếu có
        if (!empty($validated['variants'])) {
            foreach ($validated['variants'] as $variantData) {
                $variant = $product->variants()->create([
                    'price' => $variantData['price'],
                    'stock' => $variantData['stock'],
                ]);

                // Gắn các giá trị thuộc tính vào biến thể
                foreach ($variantData['attribute_values'] as $attributeId => $valueIds) {
                    $variant->attributeValues()->attach($valueIds);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Hiển thị thông tin chi tiết sản phẩm.
     */
    public function show(Product $product, $viewType = 'show')
    {
        $variants = $product->variants;

        if ($viewType === 'detail') {
            return view('client.detail_product', compact('product', 'variants'));
        }

        return view(self::PATH_VIEW . 'show', compact('product', 'variants'));
    }

    /**
     * Hiển thị form cập nhật sản phẩm.
     */
    public function edit(Product $product)
    {
        $productt = Product::with(['variants.attributeValues'])->findOrFail($product->id);
        $product = Product::with('variants')->findOrFail($product->id);
        $attributes = Attibute::with('values')->get();
        $categories = Category::all();
        return view(self::PATH_VIEW . 'edit', compact('product', 'attributes', 'categories', 'productt'));
    }

    /**
     * Cập nhật sản phẩm.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        // Lấy dữ liệu đã xác thực từ request
        $validated = $request->validated();
        $validated['is_active'] ??= 0;
        $validated['is_hotdeal'] ??= 0;
        $validated['is_new'] ??= 0;
        $validated['is_showhome'] ??= 0;

        // Xử lý cập nhật hình ảnh nếu có tải lên
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);  // Xóa ảnh cũ
            }
            $validated['image'] = Storage::put('images/products', $request->file('image'));  // Lưu ảnh mới
        }

        // Cập nhật thông tin sản phẩm
        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $validated['image'] ?? $product->image,
            'price' => $validated['price'],
            'base_price' => $validated['base_price'],
            'quantity' => $validated['quantity'],
            'category_id' => $validated['category_id'],
            'is_active' => $validated['is_active'],
            'is_hotdeal' => $validated['is_hotdeal'],
            'is_new' => $validated['is_new'],
            'is_showhome' => $validated['is_showhome'],
        ]);

        if (!empty($validated['variants'])) {
            foreach ($validated['variants'] as $variantData) {
                if (isset($variantData['id'])) {
                    $variant = $product->variants()->findOrFail($variantData['id']);
                    $variant->update([
                        'price' => $variantData['price'],
                        'stock' => $variantData['stock'],
                    ]);
                } else {
                    $variant = $product->variants()->create([
                        'price' => $variantData['price'],
                        'stock' => $variantData['stock'],
                    ]);
                }

                if (!empty($variantData['attribute_values'])) {
                    $attributeValues = [];

                    foreach ($variantData['attribute_values'] as $attributeId => $valueIds) {
                        if (is_array($valueIds)) {
                            $attributeValues = array_merge($attributeValues, $valueIds);
                        } else {
                            $attributeValues[] = $valueIds;
                        }
                    }

                    $variant->attributeValues()->sync($attributeValues);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }



    /**
     * Xóa sản phẩm.
     */
    public function destroy(Product $product)
    {
        if (!empty($product->image) && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
