@extends('layout')

@section('menu')
    Test4
@endsection

@section('content')
    <span class="h2"><a href="{{ route('tasks.index') }}">Active tasks</a></span> / 
    <span class="h3"><a href="{{ route('tasks.index', ['done' => true]) }}">Done tasks</a></span>
    <div class="clearfix"></div>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">New task</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Created at</td>
                <td></td>
            </tr>            
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td><a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></td>
                <td>{{ $task->created_at }}</td>
                <td>
                    @if(!$task->done)
                        <form method="POST" action="{{ route('tasks.update', $task) }}">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Done</button>
                        </form>
                    @endif
                </td>
            </tr>     
            @endforeach
        </tbody>
    </table>
@endsection