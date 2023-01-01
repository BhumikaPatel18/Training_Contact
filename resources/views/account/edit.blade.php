@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Edit Record</h2>

</div>
    {{-- {!! Form::open([
        'route' => ['accounts.update',$account->id],
        'method' => 'Post'
        ]) !!} --}}
     {!! Form::model($account, ['route' => ['account.update', $account->id], 'method' => 'Post']) !!}

    @method('PATCH')
    @include('account.form')
<div class="container">


    <button type="submit" class="btn btn-primary">Update form</button>
    <a href="{{route('account.index')}}" class="btn btn-primary">Cancel</a>
</div>


{!! Form::close() !!}


@endsection
