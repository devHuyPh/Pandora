@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Add New Attibute</h1>
    </div>

    <section class="section">
        <form action="{{ route('attributes.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                        name="name" id="name" value="{{ old('name') }}" />
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>


            <div class="row mb-3">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>
            </div>
        </form><!-- End General Form Elements -->
    </section>
@endsection
