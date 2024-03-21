<?php

namespace App\Livewire;
use App\Models\Task;
use Livewire\Component;

class TodoForm extends Component
{
    public $tasks;
    public $newTask = '';
    public $validationError = "";

    public function addTask()
    {
        if(!$this->newTask) {
            $this->validationError = "To Do is required";
            return;
        }

        $this->validationError = "";
        $task = new Task();
        $task->title = $this->newTask;
        $task->status = 'pending';
        $task->save();

        $this->emit('refreshTodoList');
        $this->newTask = '';

    }

    public function render()
    {
        return view('livewire.todo-form');
    }
}
