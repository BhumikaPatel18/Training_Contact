@extends('layouts.app')
@section('content')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">Name: {{$account->name}}</li>
        <li class="list-group-item">Address: {{$account->address}}</li>
    </ul>
    <br>
    {{-- <a href="{{route('students.edit',$student->id)}}" class="btn btn-primary">Edit</a> --}}
    <a href="{{route('account.index')}}" class="btn btn-primary">Cancel</a>
</div>

@endsection
