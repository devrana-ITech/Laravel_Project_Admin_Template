@extends('layout.backend.main')

@section('page_content')

<div class="container mb-5">
    <div class="text-end mb-3 mt-3">
        <a class="btn btn-primary" href="{{ url('user') }}">Back</a>
</div>
<form action="{{url('user')}}"  method="post"  enctype="multipart/form-data">
    @csrf
    <div class="input-block mb-3 row">
        <label class="col-lg-3 col-form-label">Name</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" name="name"  value="{{old('name')}}">
            @error('name')
             <span style="color: red" >{{$message}}</span>
            @enderror
        </div>


    </div>
    <div class="input-block mb-3 row">
        <label class="col-lg-3 col-form-label">Email</label>
        <div class="col-lg-9">
            <input type="text" class="form-control"  name="email"  value="{{old('email')}}">
            @error('email')
            <span style="color: red" >{{$message}}</span>
       @enderror
        </div>

    </div>
    <div class="input-block mb-3 row">
        <label class="col-lg-3 col-form-label">Phone</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" name="phone"  value="{{old('phone')}}">
            @error('phone')
            <span style="color: red" >{{$message}}</span>
       @enderror
        </div>

    </div>
    <div class="input-block mb-3 row">

    </div>
    <div class="input-block mb-3 row">
        <label class="col-lg-3 col-form-label">Photo</label>
        <div class="col-lg-9">
            <input type="file" class="form-control"  name="photo"  value="{{old('photo')}}">
            @error('photo')
            <span style="color: red" >{{$message}}</span>
       @enderror
        </div>

    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>


@endsection
