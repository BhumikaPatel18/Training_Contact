<div class="container">


<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null,
        ['class' => 'form-control','id' => 'name','name' => 'name','placeholder'=>'Enter name']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('address', 'Address') !!}
    {!! Form::textarea('address','', ['class' => 'form-control','name' => 'address', 'id' => 'address', 'rows' => 2, 'cols' => 40,'placeholder'=>'Enter Address' ]) !!}
    </div>


    <div class="form-group">
        <label for="select">Project Title</label>
         @php
          $projects = DB::table('projects')->select('id','title')->get();
        @endphp
        {{-- @dd($projects) --}}
        <select name="project_id" class="form-control", value="">
            @foreach ($projects  as $project)
            <option value="{{$project->id}}">{{$project->title}}</option>
            @endforeach
        </select>
    </div>
</div>
</div>
