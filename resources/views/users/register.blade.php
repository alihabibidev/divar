@extends('layouts.app');
@section('content')
    <form action="{{route('register.index')}}" class="form-group" method="post">
        @csrf
        <label for="fname" class="form-label">insert your first name</label>
        <input type="text" class="form-control" name="fname">

        <label for="lname" class="form-label">insert your last name</label>
        <input type="text" class="form-control" name="lname">

        <label for="phone_number" class="form-label">insert your phone number</label>
        <input type="number" class="form-control" name="phone_number">

        @if($errors->any())
        @foreach($errors->all() as $error)
                <ul>
                    <li>{{$error}}</li>
                </ul>
            @endforeach
        @endif
        {{--
<label for="verification_code" class="form-label">insert the verification code</label>
<input type="password" class="form-control" name="verification_code">--}}
        <input type="submit" class="btn btn-primary"></form>

@endsection
