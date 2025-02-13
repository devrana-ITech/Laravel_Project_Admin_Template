{{-- @props(['user']) --}}


{{-- <option value="{{$user->id}}">{{$user->name}}</option> --}}

{{-- @php
print_r($users)
@endphp --}}

<select name="users" id="">
    <option value="">Select All</option>
    @foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
 </select>
