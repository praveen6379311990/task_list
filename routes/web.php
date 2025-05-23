<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
// use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return redirect()->route('tasks.index');
});

Route::view('/tasks/create','create')->name('tasks.create');

Route::post('/tasks',function(TaskRequest $request){
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show',['task'=>$task->id])->with('success', 'Task created succesfully');
})->name('tasks.store');

Route::get('/tasks/{task}/edit',function(Task $task){
    return view('edit',[
        'task'=>$task
    ]);
})->name('tasks.edit');

Route::put('/tasks/{task}',function(Task $task,TaskRequest $request){
    $task->update($request->validated());
    return redirect()->route('tasks.show',['task'=>$task->id])->with('success', 'Task updated succesfully');

})->name('tasks.update');

Route::get('/tasks', function () {
    return view('index',[
        'tasks'=>Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::get('/tasks/{task}',function(Task $task){
    return view('show',[
        'task'=>$task
    ]);
})->name('tasks.show');

Route::put('/tasks/{task}/toggle-completed', function(Task $task){
    $task->completed = !$task->completed;
    $task->save();
    // dd($task->completed);
    return redirect()->back()->with('success','Task status updated');
})->name('tasks.toggle-complete');

Route::delete('/tasks/{task}',function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success','Successfully Deleted');
})->name('tasks.destroy');

Route::fallback(function(){
    return 'fds';
});
