
@section('title', @isset($task)?'Edit Task':'Create Task')

<!-- @section('styles')
<style>
    .error-message{
        color: red;
        font-size: small;
    }
</style>
@endsection -->

@section('content')
    <form method="post" action="{{ isset($task)?route('tasks.update',['task'=> $task->id]):route('tasks.store') }}" >
    <!-- <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"> -->
        @csrf
        @if(isset($task))
        @method("PUT") 
        @endif
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" 
            @class(['border-red-500'=>$errors->has('title')])
            id="title" value="{{$task->title ?? old('title')}}">
            @error('title')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" 
            @class(['border-red-500'=>$errors->has('description')])

            rows="5">{{$task->description ?? old('description')}}</textarea>
            @error('description')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description"
            @class(['border-red-500'=>$errors->has('long_description')])

             rows="10">{{$task->long_description ?? old('long_description')}}</textarea>
            @error('long_description')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="flex gap-2 items-center">
        <button type="submit" class="btn">@isset($task)Update Task @else Add Task @endisset</button>
        <a class="link" href="{{ route('tasks.index') }}">Cancel</a>
        </div>
    </form>
@endsection
