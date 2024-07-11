<x-layout>
    <main>
        <div class="grid grid-cols-2 gap-4">
            <div>
                form here
            </div>
            <div>
                <table class="border-2">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td></td>
                    </tr>
                    </thead>

                    @foreach($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->id }}
                            </td>
                            <td>
                                {{ $task->name }}
                            </td>
                            <td>
                                complete
                                <form
                                    method="post"
                                    name="delete-task-{{ $task->id }}"
                                    id="delete-task-{{ $task->id }}"
                                    action="{{route('tasks.destroy', $task)}}"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </main>
</x-layout>
