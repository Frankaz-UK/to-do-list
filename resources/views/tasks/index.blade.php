<x-layout>
    <main>
        <div class="row">
            <div class="col-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form
                    method="post"
                    name="create-task"
                    id="create-task"
                    action="{{route('tasks.store')}}"
                >
                    @csrf
                    @method('POST')
                    <input class="form-control col-12 mb-2 @error('name') is-invalid @enderror" type="text" placeholder="Insert task name" id="name" name="name" value="{{ old('name') }}" />
                    <button type="submit" class="btn btn-primary col-12">Add</button>
                </form>
            </div>
            <div class="col-8">
                <tasks-table></tasks-table>
            </div>
        </div>
    </main>
</x-layout>
