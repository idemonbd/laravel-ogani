@extends('layouts.back')

@push('styles')

@endpush

@section('content')
<div class="card">
            <div class="card-header border-bottom p-1 mb-1">
                <h4>All pages</h4>
                <div class="text-right">
                    <a href="{{ route('account.pages.create') }}" class="btn btn-primary">
                        <span>Add New Page</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Type</th>
                            <th>Name</th>
                            <th>Menu</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                        <tr class="text-center">
                            <td>{{ $page->type }}</td>
                            <td><a href="{{ url('pages/'.$page->slug) }}">{{ $page->name }}</a></td>
                            <td>{{ $page->menu->name ?? 'None' }}</td>
                            <td>{{ $page->active ? 'Active':'Inactive' }}</td>
                            <td>
                                <button onclick="deleteItem({{ $page->id }})" class="btn btn-sm btn-danger">Delete</button>
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
