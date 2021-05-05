@extends('layouts.back')

@push('styles')

@endpush

@section('content')
<div class="card">
            <div class="card-header border-bottom p-1 mb-1">
                <h4>Pages</h4>
                <div class="text-right">
                    <a href="{{ route('account.pages.create') }}" class="btn btn-primary">
                        <span>New</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                        <tr class="text-center">
                            <td><a href="{{ url('pages/'.$page->slug) }}">{{ $page->title }}</a></td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ $page->active ? 'Active':'Inactive' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                        data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('account.pages.edit', $page->id) }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            onclick="deleteItem({{ $page->id }})">
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

{{-- DELETE FORM --}}
<form id="deleteItem" method="POST">
    @csrf
    @method('delete')
</form>

@endsection

@push('scripts')

<script>
    function deleteItem(id) {
        let url = '{{ url('account/pages') }}/' + id;
        if (confirm('Are you sure want to delete?')) {
            $('#deleteItem').attr('action', url).submit();
        }
    }
</script>
@endpush
