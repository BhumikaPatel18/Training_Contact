@extends('layouts.app')
    @section('content')

        <div class="container">
            <h2>Create New Project</h2>
        </div>

        {!! Form::open([
            'route' => 'projects.store',
            'method' => 'Post',])
            !!}

            @include('project.form')

            <div class="container">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('projects.index') }}" class="btn btn-primary">Cancel</a>
            </div>
        {!! Form::close() !!}

    @endsection
