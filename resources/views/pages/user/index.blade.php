@extends('layout.backend.main')
@section('page_content')


{{-- <x-user/> --}}


<select name="users" id="">
<option value="">Select All</option>
@foreach ($users as $user)
{{-- <option value="{{$user->id}}">{{$user->name}}</option> --}}
@endforeach
</select>
<x-useradmin :$users/>

{{-- <x-user :$users="Hasan"/> --}}



    <div class="container">
        <div class="text-end mt-5">
            <a class="btn btn-primary" href="{{ url('user/create') }}">Add User</a>
    </div>
    <form class="col-md-9" action="{{ url('user/search') }}" method="post" >
        @csrf
        <div class="input mb-5">
            <div class=" d-flex">
                <input type="text" class="form-control" name="name" placeholder="Search"  value="{{@$requestdata}}">
                <button class="btn btn-primary" >Submit</button>
            </div>
        </div>
    </form>
        <table class="border-collapse border border-gray-400 w-3xl">
            <thead >
              <tr >
                <th class="border border-gray-300 p-1">Id</th>
                <th class="border border-gray-300 p-1">Photo</th>
                <th class="border border-gray-300 p-1">Name</th>
                <th class="border border-gray-300 p-1">Phone</th>
                <th class="border border-gray-300 p-1">Email</th>
                <th class="border border-gray-300 p-1">Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td class="border border-gray-300 p-2">{{$user->id}}</td>
                    <td> <img width="50" height=""
                        src="{{ asset('photo') }}/{{ $user->photo }}" alt="{{ $user->name }}"
                        srcset=""> </td>
                    <td class="border border-gray-300 p-2">{{$user->name}}</td>
                    <td class="border border-gray-300 p-2">{{$user->email}}</td>
                    <td class="border border-gray-300 p-2">{{$user->phone}}</td>
                    <td class="group-btn">
                        <a class="btn btn-info" href="{{ url("user/$user->id") }}">Show</a>
                        <a class="btn btn-primary"
                            href="{{ url("user/$user->id/edit") }}">Edit</a>
                            <form action="{{url("user/$user->id")}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                    </td>
                  </tr>
                  @empty
                    <tr>
                        <td class="col-md-6">Data not found</td>
                    </tr>

                  @endforelse
            </tbody>
          </table>
          <div class="d-flex justify-content-end mt-5">
            {!! $users->links('pagination::bootstrap-5')!!}
          </div>
    </div>


@endsection



