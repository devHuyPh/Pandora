@extends('admin.layouts.master')

@section('content')

        {{-- <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>Add lightweight datatables to your project with using the <a
                                    href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                    DataTables</a> library.
                                Just add <code>.datatable</code> class name to any table you wish to conver to a
                                datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/"
                                    target="_blank">more examples</a>.</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>N</b>ame
                                        </th>
                                        <th>Ext.</th>
                                        <th>City</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                        <th>Completion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>Zelenia Roman</td>
                                        <td>7516</td>
                                        <td>Redwater</td>
                                        <td>2012/03/03</td>
                                        <td>31%</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section> --}}
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
        <ul>
            @foreach ($products as $product)
                <li>
                    <strong>{{ $product->name }}</strong> - 
                    <a href="{{ route('products.show', $product->id) }}">View</a> | 
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
@endsection
