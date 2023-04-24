<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('Tasks.create') }}" class="btn-link btn-lg mb-2">+ New Task</a>
            @foreach ($Tasks as $task)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        {{ $task->title }}
                    </h2>
                    <p class="mt-2">
                        {{ Str::limit($task->text, 200) }}
                    </p>
                    <span>
                        {{ $task->updated_at->diffForHumans() }}
                    </span>
                </div>
            @endforeach
            {{ $tasks->links() }}
        </div>

    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @foreach ($Tasks as $task)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        {{ $task->title }}
                    </h2>
                    <p class="mt-2">
                        {{ Str::limit($task->text, 200) }}
                    </p>
                    <span>
                        {{ $task->updated_at->diffForHumans() }}
                    </span>
                </div>
            @endforeach
            {{ $tasks->links() }}
        </div>


    </div>
    </div>
</x-app-layout>
