@extends('layouts.back')

@section('content')
    <div class="card">
        <div class="card-header border-bottom p-1 mb-1">
            <h4>Menus</h4>
            <div class="text-right">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                    <span>Add menu</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Name</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr class="text-center">
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->position }}</td>
                            <td>{!! $menu->active ? '<p class="text-success">Actived</p>' : '<p class="text-info">Inactive</p>' !!}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                        data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (!$menu->active)
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="activeItem({{ $menu->id }})">
                                                <i data-feather="check" class="mr-50"></i>
                                                <span>Active</span>
                                            </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('account.menus.edit', $menu->id) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            onclick="deleteItem({{ $menu->id }})">
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
    <div class="modal fade text-left" id="createModal" tabindex="-1" aria-labelledby="createModal" style="display: none;"
        aria-hidden="true">
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
                            <input type="text" name="name" placeholder="Name" class="form-control"
                                value="{{ old('name') }}">
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

    {{-- ACTIVE FORM --}}
    <form id="activeItem" method="POST" class="d-none">
        @csrf
        @method('put')
        <input type="hidden" name="active" value="1">
    </form>
    {{-- DELETE FORM --}}
    <form id="deleteItem" method="POST" class="d-none">
        @csrf
        @method('delete')
    </form>

@endsection

@push('scripts')

    <script>
        function activeItem(id) {
            let url = '{{ url('account/menus') }}/' + id;
            $('#activeItem').attr('action', url).submit();
        }

        function deleteItem(id) {
            let url = '{{ url('account/menus') }}/' + id;
            if (confirm('Are you sure want to delete?')) {
                $('#deleteItem').attr('action', url).submit();
            }
        }

    </script>
@endpush
