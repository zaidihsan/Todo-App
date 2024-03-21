
<div class="container mt-5">
    @if($validationError)
        {{ $validationError }}
    @endif
    <input type="text" class="form-control mb-2" wire:model="newTask" placeholder="Add new task...">
    <button class="btn btn-primary mb-2" wire:click="addTask">Add Task</button>
</div>
