@extends('layout.backend.main');
@section('page_content')


<div class="text-end mt-5">
    <a class="btn btn-primary" href="{{ url('user') }}">Manage User</a>
</div>
<div class="container">

    <h2 class="text-center">Show User</h2>

    <div class="input-block mb-3 row">
        <label class="col-lg-3 col-form-label">Name :</label>
        <div class="col-lg-9">
            <input disabled type="text" class="form-control" name="name"  value="{{$users['name']}}">
        </div>
    </div>
    <div class="input-block mb-3 row">
        <label class="col-lg-3 col-form-label">Email :</label>
        <div class="col-lg-9">
            <input disabled type="text" class="form-control"  name="email"  value="{{$users['email']}}">
        </div>

    </div>
    <div class="input-block mb-3 row">
        <label class="col-lg-3 col-form-label">Phone :</label>
        <div class="col-lg-9">
            <input disabled type="text" class="form-control" name="phone"  value="{{$users['phone']}}">
        </div>

    </div>
    <div class="input-block mb-3 row">

    </div>
    <div class="input-block mb-3 row">
        <label class="col-lg-3 col-form-label">Photo :</label>
        <div class="col-lg-9">
            <img width="150" height="" src="{{asset('photo')}}/{{$users['photo']}}" alt="{{$users['name']}}" srcset="">
        </div>
    </div>
</div>

@endsection
