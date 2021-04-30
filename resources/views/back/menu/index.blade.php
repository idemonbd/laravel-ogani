@extends('layouts.back')

@push('styles')

@endpush

@section('content')
<div class="card">
            <div class="card-header border-bottom p-1 mb-1">
                <h4>All Menus</h4>
                <div class="text-right">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        <span>Add menu</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Items</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                        <tr class="text-center">
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->position }}</td>
                            <td>{{ $menu->pages }}</td>
                            
                            <td>
                                <button onclick="deleteItem({{ $menu->id }})" class="btn btn-sm btn-danger">Delete</button>
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
                <h4 class="modal-title" id="createModal">Add New Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('account.menus.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Position</label>
                        <select name="position" class="form-control">
                            <option value="header">Header Menu</option>
                            <option value="footer">Footer Menu</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Add
                        menu</button>
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
        let url = '{{ url('account/menus') }}/' + id;
        if (confirm('Are you sure want to delete?')) {
            $('#deleteItem').attr('action', url).submit();
        }
    }
</script>
@endpush
