@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form action="">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Product</h5>
                            <!-- General Form Elements -->

                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Base Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Is </label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="card">
                                <div class="left col-sm-10">
                                    <button type="submit" class="btn btn-light">Add Image</button>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Action</h5>
                            <!-- Advanced Form Elements -->
                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Parameters</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Is Active</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Is Hot Deal</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Is Show Home</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Is New</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Category</label>
                                <div class="mb-3">
                                    <select class="form-select" id="floatingSelect" required
                                        aria-label="Floating label select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Tags</label>
                                <div class=" mb-3">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option selected>Open this select menu</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Attributes</label>
                                @foreach ($attributes as $attribute)
                                    <div class=" mb-3">
                                        <select class="form-select" id="floatingSelect"
                                            name="variants[0][attribute_values][]" required
                                            aria-label="Floating label select example">
                                            <option selected>Open this select menu</option>
                                            @foreach ($attribute->values as $value)
                                                <option value="{{ $value->id }}">{{ $value->value }}</option>
                                            @endforeach
                                        </select>
                                @endforeach
                            </div> --}}
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
        </form>
    </section>
@endsection
