@extends('layouts.back')
@section('content')
<div class="row">
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item">General Settings</li>
            <li class="list-group-item">Shop Settings</li>
            <li class="list-group-item">Payment Settings</li>
        </ul>
    </div>
    <div class="col-md-9">
       <div class="card">
           <div class="card-header">
              <b>General Setting</b>
           </div>
           <div class="card-body">
            <form action="{{ route('account.settings.update', $setting->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                 <div class="form-group">
                     <label for="">Site Title</label>
                     <input type="text" name="name" value="{{ $setting->name }}" class="form-control" required>
                 </div>
                 <div class="form-group">
                     <label for="">Address</label>
                     <input type="text" name="address"  value="{{ $setting->address }}" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="">Email</label>
                     <input type="text" name="email"  value="{{ $setting->email }}" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="">Phone</label>
                     <input type="text" name="phone"  value="{{ $setting->phone }}" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="">Logo</label>
                     <input type="file" name="logo" class="form-control">
                 </div>
                 <img class="img" src="{{ url('uploads/'.$setting->logo) }}" alt="">
                 <div class="form-group text-right">
                     <button type="submit" class="btn btn-dark">Update</button>
                 </div>
             </form>
           </div>
       </div>
    </div>
</div>
@endsection
