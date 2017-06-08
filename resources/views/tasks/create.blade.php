@extends('layout')

@section('content')
    <h2>New task</h2>

    <form method="POST" action="{{ route('tasks.store') }}">
        {{ csrf_field() }}
         <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Task name" value="{{ old('name') }}">
            {{ $errors->first('name') }}
        </div>
        <button type="submit" class="btn btn-primary">Save</button> <a href="{{ route('tasks.index') }}" class="btn btn-default">Cancel</a>
    </form>
@endsection