@extends('layouts.back')

@push('styles')

@endpush

@section('content')
<div class="card">
            <div class="card-header border-bottom p-1 mb-1">
                <h4>Categories</h4>
                <div class="text-right">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        <span>New</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Products</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                        <tr class="text-center">
                            <td>{{ $index+1 }}</td>
                            <td>
                                <img src="{{ url( 'uploads/'.$category->image ) }}" class="img" style="max-height: 100px">    
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->products->count() }} Products</td>
                            
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                        data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('account.categories.edit', $category->id) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            onclick="deleteItem({{ $category->id }})">
                                            <i data-feather="trash" class="mr-50"></i>
                                            <span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
</div>

{{-- Create Modal --}}
<div class="modal fade text-left" id="createModal" tabindex="-1" aria-labelledby="createModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createModal">Add New Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('account.categories.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Add
                        Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- DELETE FORM --}}
<form id="deleteItem" method="POST">
    @csrf
    @method('delete')
</form>

@endsection

@push('scripts')

<script>
    function deleteItem(id) {
        let url = '{{ url('account/categories') }}/' + id;
        if (confirm('Are you sure want to delete?')) {
            $('#deleteItem').attr('action', url).submit();
        }
    }

</script>
@endpush
