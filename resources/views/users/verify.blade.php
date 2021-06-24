@extends('layouts.app')
<form method="get" action="{{route('verify')}}" >
<label for="phone_number" class="form-label">insert your phone number</label>
<input type="number" class="form-control" name="phone_number">

</form>
