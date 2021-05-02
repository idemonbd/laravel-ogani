@extends('layouts.back')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/back/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/vendors/css/file-uploaders/dropzone.min.css') }}">
@endpush

@section('content')
    <form action="{{ route('account.products.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-8">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Product</h4>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show" style="">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description"
                                    rows="12">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Options</h4>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a data-action="collapse" class=""><i data-feather="chevron-down"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show" style="">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Categories</label>
                                <select name="categories[]" class="select2 form-control" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="customFile">Images</label>
                                <div class="custom-file">
                                    <input type="file" name="images[]" class="custom-file-input" id="customFile" multiple>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Product Status</label>
                                <div class="d-flex">
                                    <div class="custom-control custom-control-primary custom-switch">
                                        <input type="checkbox" name="status" class="custom-control-input" id="status"
                                            checked>
                                        <label class="custom-control-label" for="status"></label>
                                    </div>
                                    <p class="mb-50">Active Product</p>
                                </div>

                                <div class="d-flex">
                                    <div class="custom-control custom-control-primary custom-switch">
                                        <input type="checkbox" name="is_future_prod" class="custom-control-input"
                                            id="featured">
                                        <label class="custom-control-label" for="featured"></label>
                                    </div>
                                    <p class="mb-50 mr-1">Featured Product</p>
                                </div>

                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('assets/back/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush
