@extends('layouts.back')
@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@section('content')
    <div class="card">
        <div class="card-header border-bottom p-1 mb-1">
            <h4>Add New page</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('account.pages.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" placeholder="ex: About Us" class="form-control"
                                value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Slug (uniqe)</label>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="about-us">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Page Content</label>
                    <textarea name="content" id="editor" class="form-control" cols="30" rows="10">{{ old('content') }}</textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Add Now</button>
                </div>
            </form>

        </div>
    </div>

@endsection
@push('scripts')

@endpush