@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Add New Product</h1>
    </div>

    <section class="section">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product Details</h5>

                            <!-- Tên sản phẩm -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $product->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Mô tả sản phẩm -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ $product->description }}"</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Hình ảnh -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="" width="100px">
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Giá -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ $product->price }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Giá cơ bản -->
                            <div class="mb-3">
                                <label for="base_price" class="form-label">Base Price</label>
                                <input type="number" class="form-control @error('base_price') is-invalid @enderror"
                                    name="base_price" value="{{ $product->base_price}}">
                                @error('base_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Số lượng -->
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    name="quantity" value="{{ $product->quantity}}">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Parameters</h5>

                            <!-- Các thông số khác -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    {{ $product->is_active ? 'checked' : '' }}>
                                <label class="form-check-label">Is Active</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_hotdeal" value="1"
                                    {{ $product->is_hotdeal ? 'checked' : '' }}>
                                <label class="form-check-label">Is Hot Deal</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_new" value="1"
                                    {{ $product->is_new ? 'checked' : '' }}>
                                <label class="form-check-label">Is New</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_showhome" value="1"
                                    {{ $product->is_showhome ? 'checked' : '' }}>
                                <label class="form-check-label">Is Show Home</label>
                            </div>

                            <!-- Danh mục -->
                            <div>
                                <label>Category</label>
                                <select name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Thuộc tính -->
                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Attributes</label>
                                @foreach ($attributes as $attribute)
                                    <div class="mb-3">
                                        <label for="attribute-{{ $attribute->id }}">{{ $attribute->name }}</label>
                                        <select
                                            class="form-select select2 @error("variants.0.attribute_values.{$attribute->id}") is-invalid @enderror"
                                            id="attribute-{{ $attribute->id }}"
                                            name="variants[0][attribute_values][{{ $attribute->id }}][]" multiple>
                                            
                                            @foreach ($attribute->values as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ isset($productt->variants[0]) && in_array($value->id, $productt->variants[0]->attributeValues->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $value->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error("variants.0.attribute_values.{$attribute->id}")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            @foreach ($product->variants as $index => $variant)
                            <div class="form-group">
                                <label for="variants[{{ $index }}][price]">Price</label>
                                <input type="text" name="variants[{{ $index }}][price]" id="variants[{{ $index }}][price]"
                                       class="form-control" value="{{ old("variants.$index.price", $variant->price) }}">
                            </div>
                        
                            <div class="form-group">
                                <label for="variants[{{ $index }}][stock]">Stock</label>
                                <input type="number" name="variants[{{ $index }}][stock]" id="variants[{{ $index }}][stock]"
                                       class="form-control" value="{{ old("variants.$index.stock", $variant->stock) }}">
                            </div>
                        @endforeach
                            <script>
                                $(document).ready(function() {
                                    $('.select2').select2();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </section>
@endsection
