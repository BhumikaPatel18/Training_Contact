<div class="container">


    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, [
            'class' => 'form-control',
            'id' => 'title',
            'name' => 'title',
            'placeholder' => 'Add Tile',
        ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', '', [
            'class' => 'form-control',
            'name' => 'description',
            'id' => 'description',
            'rows' => 2,
            'cols' => 40,
            'placeholder' => 'Add Description',
        ]) !!}
    </div>

    <div class="form-group">
        <label for="select">Assign to</label>
         @php
          $accounts = DB::table('accounts')->select('name','id')->get();
        @endphp
        {{-- @dd($accounts) --}}
        <select name="account_id" class="form-control">
            @foreach ($accounts  as $account)
            <option value="{{$account->id}}">{{$account->name}}</option>
            @endforeach
        </select>
    </div>

</div>

