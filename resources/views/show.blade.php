@extends('layouts.app')
@section('title',$task->title)
@section('content')

<div>
    <nav class="mb-4">
        <a href="{{ route('tasks.index') }}"
            class="link"><- Go back main page</a>
    </nav>

</div>

<p class="mb-4 text-slate-700">{{$task->description}}</p>
@if ($task->long_descrioption)
<p class="mb-4 text-slate-700">{{ $task->long_descrioption }}</p>
@endif
<p class="mb-4 text-slate-500 text-sm">Created at {{$task->created_at}} - Updated at {{$task->updated_at}}</p>

<div class="mb-4">
    @if ($task->completed)
    <span class="font-medium text-green-500">Completed</span>
    @else
    <span class="font-medium text-red-500">Not Completed</span>
    @endif
</div>

<div class="flex gap-2">

    <a href="{{ route('tasks.edit', $task) }}" class="btn">Edit</a>

    <form action="{{ route('tasks.toggle-complete',['task'=>$task]) }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">{{ $task->completed?'Mark as not Completed': 'Mark as Completed' }}</button>
    </form>



    <form method="post" action="{{ route('tasks.destroy',['task'=>$task->id]) }}">
        @csrf
        @method('DELETE')
        <button class="btn" type="submit">Delete</button>
    </form>
</div>
@endsection()