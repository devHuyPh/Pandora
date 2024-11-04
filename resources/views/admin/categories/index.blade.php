@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>List categoriess</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">categories</li>
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
                                @foreach ($data as $categories)
                                    <tr>
                                        <td>{{ $categories->id }}</td>
                                        <td>{{ $categories->name }}</td>
                                        <td>

                                            <a class="btn btn-success" href="{{ route('categories.edit', $categories) }}"><i
                                                    class="bi bi-pen-fill"></i></a>
                                            <a href="">
                                                <form action="{{ route('categories.destroy', $categories) }}" method="post">
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
