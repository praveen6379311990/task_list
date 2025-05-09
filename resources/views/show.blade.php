@extends('layouts.app')
@section('title',$task->title)
@section('content')

<div>{{$task->description}}</div>
<div>{{$task->long_descrioption}}</div>
<div>{{$task->completed}}</div>
<div>{{$task->created_at}}</div>
<div>{{$task->updated_at}}</div>

<div>
    <form action="{{ route('tasks.delete',['task'=>$task->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endsection()
