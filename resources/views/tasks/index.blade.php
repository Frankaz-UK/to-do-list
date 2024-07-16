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
                <tasks-table></tasks-table>
            </div>
        </div>
    </main>
</x-layout>
