@extends('layouts.back')

@section('content')
    <div class="card">
        <div class="card-header border-bottom p-1 mb-1">
            <h4>{{ $menu->name }}</h4>
            <div class="text-right">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                    <span>Add Page to menu</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($menu->pages as $page)
                    <li>{{$page->id.' '.$page->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Create Modal --}}
    <div class="modal fade text-left" id="createModal" tabindex="-1" aria-labelledby="createModal" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createModal">Add new page to menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('account.menus.update', $menu->id ) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Order</label>
                            <input type="number" name="order" class="form-control" placeholder="ex: 1">
                        </div>
                        <div class="form-group">
                            <label for="">Page</label>
                            <select name="page_id" class="form-control">
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Add to menu</button>
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
