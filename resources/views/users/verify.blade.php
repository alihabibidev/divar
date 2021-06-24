@extends('layouts.app')
<form method="post" action="{{route('verify.index')}}" >
@csrf
<label for="verification_code" class="form-label">insert your verification</label>
<input type="number" class="form-control" name="verification_code">
    <input type="hidden" name="phone_number" value=" {{ $user->phone_number }}">
    <input type="submit" class="btn btn-primary">


</form>
