<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On;

class ToDoListManager extends Component
{
    public $tasks;
    public $newTask = '';

    protected  $listener=['refreshTodoList'=> '$refresh'];

    public function mount()
    {
        $this->tasks = Task::all()->toArray();
    }
    public function deleteTask($taskId)
    {
        Task::destroy($taskId);
        $this->tasks = array_values(array_filter($this->tasks, function ($task) use ($taskId) {
            return $task['id'] != $taskId;
        }));
    }
    public function updateTaskStatus($taskId, $status)
{
    $task = Task::find($taskId);
    if ($task) {
        $task->status = $status;
        $task->save();
    }

}
public function updateTaskTitle($taskId, $title)
{
    $task = Task::find($taskId);
    if ($task) {
        $task->title = $title;
        $task->save();
    }
}

    public function render()
    {
        return view('livewire.to-do-list-manager');
    }

    #[On('refreshTodoList')]
    public function refreshList()
    {dd('ddd');
        $this->tasks = Task::all()->toArray();
    }
}
