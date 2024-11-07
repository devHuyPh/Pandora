@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Add New Product</h1>
    </div>

    <section class="section">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product Details</h5>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>

                            <div class="mb-3">
                                <label for="base_price" class="form-label">Base Price</label>
                                <input type="number" class="form-control" name="base_price" required>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="quantity" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Parameters</h5>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1">
                                <label class="form-check-label">Is Active</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_hotdeal" value="1">
                                <label class="form-check-label">Is Hot Deal</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_new" value="1">
                                <label class="form-check-label">Is New</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_showhome" value="1">
                                <label class="form-check-label">Is Show Home</label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Attributes</label>
                                @foreach ($attributes as $attribute)
                                    <div class="mb-3">
                                        <label for="attribute-{{ $attribute->id }}">{{ $attribute->name }}</label>
                                        <select class="form-select select2" id="attribute-{{ $attribute->id }}" 
                                            name="variants[0][attribute_values][{{ $attribute->id }}][]" required 
                                            aria-label="Floating label select example" multiple>
                                            @foreach ($attribute->values as $value)
                                                <option value="{{ $value->id }}">{{ $value->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>
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
