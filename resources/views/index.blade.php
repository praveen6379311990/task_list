@extends('layouts.app')
@section('title','ALl tasks')
@section('content')
<div>
    @foreach ($tasks as $task)
    <div>
        <a href="{{route('tasks.show',[$task->id])}}">{{$task->title}}</a>
    </div>
    @endforeach
</div>
@endsection
