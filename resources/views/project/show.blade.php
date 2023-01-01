@extends('layouts.app')
@section('content')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $project->id }}</li>
            <li class="list-group-item">Title: {{ $project->title }}</li>
            <li class="list-group-item">Description: {{ $project->description }}</li>
        </ul>
        <br>
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Cancel</a>
    </div>
@endsection
