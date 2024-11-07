@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>List Attributes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">attribute</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ Storage::url($product->image) }}" alt=""
                                                    width="100px">
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('products.edit', $product) }}">Sửa</i></a>
                                            <a class="btn btn-primary"
                                                href="{{ route('products.show', $product) }}">Show</a>

                                            <form action="{{ route('products.destroy', $product) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-dark " type="submit"
                                                    onclick="return confirm('xoa nhe')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
