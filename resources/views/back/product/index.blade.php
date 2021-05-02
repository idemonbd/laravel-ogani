@extends('layouts.back')

@push('styles')

@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom p-1 mb-1">
                    <h4>Products</h4>
                    <div class="text-right">
                        <a href="{{ route('account.products.create') }}" class="btn btn-primary">
                            <span>New</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Categories</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                                <tr class="text-center">
                                    <td>{{ $index+1 }}</td>
                                    <td>
                                        <img src="{{ url('uploads/' . $product->images[0]) }}" class="img"
                                            style="max-height: 100px">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>
                                        @foreach ($product->categories as $category)
                                            <span class="badge badge-primary">{{ $category->name }} </span>
                                        @endforeach
                                    </td>
                                    <td>{{ $product->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('account.products.edit', $product->id) }}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="deleteItem({{ $product->id }})">
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
            let url = '{{ url('account/products') }}/' + id;
            if (confirm('Are you sure want to delete?')) {
                $('#deleteItem').attr('action', url).submit();
            }
        }

    </script>
@endpush
