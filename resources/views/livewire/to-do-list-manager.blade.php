<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>
                        <input type="text" class="form-control" wire:model="tasks.{{ $loop->index }}.title" wire:change="updateTaskTitle({{ $task['id'] }}, $event.target.value)">
                    </td>
                    <td>
                        <select class="form-select" wire:model="tasks.{{ $loop->index }}.status" wire:change="updateTaskStatus({{ $task['id'] }}, $event.target.value)">
                            <option value="pending" {{ $task['status'] === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="complete" {{ $task['status'] === 'complete' ? 'selected' : '' }}>Complete</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-danger" wire:click="deleteTask({{ $task['id'] }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
