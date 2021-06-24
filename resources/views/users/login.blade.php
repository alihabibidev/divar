@extends('layouts.app')
<form action="{{route('login.index')}}" method="post">
    @csrf
<label for="phone_number" class="form-label">insert your phone number</label>
<input type="number" class="form-control" name="phone_number">

<input type="submit" class="btn btn-primary"></form>
