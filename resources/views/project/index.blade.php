@extends('layouts.app')
@section('content')

<div class="container">
    <a href={{route('projects.create')}} class="btn btn-primary">Add new project</a>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Assign To</th>
                <th colspan=2 class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>

                {{--  relationship --}}
                                <td>
                                {{-- {{ $project->account->name  }} --}}
                                </td>

                                <td><a href="{{route('projects.edit',$project->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{route('projects.show',$project->id)}}" class="btn btn-primary">Show</a></td>
                                <td><form action="{{route('projects.destroy',$project->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                </form></td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection
