@extends('layouts.app')
@section('content')

<div class="container">

    <h2>Create New Account</h2>

</div>

    {!! Form::open([
        'route' => 'account.store',
        'method' => 'Post'
    ]) !!}

    @include('account.form')

    <div class="container">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('account.index')}}" class="btn btn-primary">Cancel</a>
</div>
    {!! Form::close() !!}

@endsection
