@extends('layouts.app')
@section('content')
    <div class="container">
        <a href={{route('account.create')}} class="btn btn-primary">Add new Account</a>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th>project name</th>
                    <th colspan=2 class="text-center">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($accounts as $account)
                        <tr>
                            <td>{{$account->name}}</td>
                            <td>{{$account->address}}</td>
                            {{-- @dd($account->projects->title) --}}
                            @php
                                $projects = DB::table('projects')->select('id','title', 'account_id')->get();
                            @endphp

                            <td>
                                {{-- @dd($projects) --}}
                                @foreach ($projects as $project )
                                    @if ($project->account_id == $account->id)
                                            {{ $project->title}}
                                    @endif
                                @endforeach
                            </td>
                            
                            <td><a href="{{route('account.edit',$account->id)}}" class="btn btn-primary">Edit</a></td>
                            <td><a href="{{route('account.show',$account->id)}}" class="btn btn-primary">Show</a></td>
                            <td>
                                <form action="{{route('account.destroy',$account->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
