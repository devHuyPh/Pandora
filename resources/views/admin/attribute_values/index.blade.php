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
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attribute as $attribute)
                                    <tr>
                                        <td>{{ $attribute->id }}</td>
                                        <td>{{ $attribute->name }}</td>
                                        <td>

                                            <a class="btn btn-success" href="{{ route('attributes.edit', $attribute) }}"><i
                                                    class="bi bi-pen-fill"></i></a>
                                            <a href="">
                                                <form action="{{ route('attributes.destroy', $attribute) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-dark bi bi-x-square-fill" type="submit"
                                                        onclick="return confirm('xoa nhe')"></button>
                                                </form>
                                            </a>
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
