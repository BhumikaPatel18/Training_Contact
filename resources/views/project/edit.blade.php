@extends('layouts.app')
    @section('content')

        <div class="container">
            <h2>Edit Record</h2>
        </div>

        {!! Form::model($project,[
            'route' => ['projects.update', $project->id],
            'method' => 'Post'])
            !!}

            @method('PATCH')
            @include('project.form')

            <div class="container">
                <button type="submit" class="btn btn-primary">Update form</button>
                <a href="{{route('projects.index')}}" class="btn btn-primary">Cancel</a>
            </div>

        {!! Form::close() !!}


    @endsection
