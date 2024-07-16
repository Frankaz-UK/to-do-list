<x-layout>
    <main>
        <div class="row">
            <div class="col-4">
                <form
                    method="post"
                    name="create-task"
                    id="create-task"
                    action="{{route('tasks.store')}}"
                >
                    @csrf
                    @method('POST')
                    <input class="form-input col-12 mb-2" type="text" placeholder="Insert task name" id="name" name="name" />
                    <button type="submit" class="btn btn-primary col-12">Add</button>
                </form>
            </div>
            <div class="col-8">
                <example-component></example-component>
                <tasks-table></tasks-table>
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Task</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->id }}
                            </td>
                            <td>
                                @if($task->getCompleteStatus())<del>@endif{{ $task->name }}@if($task->getCompleteStatus())</del>@endif
                            </td>
                            <td>
                                @if(!$task->getCompleteStatus())
                                    <form
                                        method="post"
                                        name="update-task-{{ $task->id }}"
                                        id="update-task-{{ $task->id }}"
                                        action="{{route('tasks.update', $task)}}"
                                        class="col-6"
                                    >
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if(!$task->getCompleteStatus())
                                    <form
                                        method="post"
                                        name="delete-task-{{ $task->id }}"
                                        id="delete-task-{{ $task->id }}"
                                        action="{{route('tasks.destroy', $task)}}"
                                        class="col-6"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">&times;</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- php echo $task->complete ? 'Uncomplete' : 'Complete'; endphp -->
                </div>
            </main>
        </x-layout>
