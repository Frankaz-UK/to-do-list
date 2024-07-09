<x-layout>
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            MLP - To Do List
        </h1>

        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
            <!--  Category -->
            <div class="relative bg-gray-100 rounded-xl lg:inline-flex">

            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
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
                        complete remove
                    </td>
                </tr>

            @endforeach
        </table>
    </main>
</x-layout>
