@extends('layout.main')

@section('content')
    <section class="bg-white dark:bg-gray-900 rounded-lg">
        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-6">
            <h2 class="mb-6 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                Edit Task
            </h2>
            <form id="update-task" action="{{ route('tasks.update', [$tasks->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="title" name="title" value="{{ ucwords($tasks->title) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $tasks->description }}</textarea>
                </div>
                <div>
                    <div class="flex">
                        <div class="flex items-center mr-4">
                            <input id="completed" type="checkbox" name="status" value="Completed"
                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                @if ($tasks->status === 'Completed') checked @endif >
                            <label for="completed"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 ">Completed</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input id="incomplete" type="checkbox" name="status" value="Incomplete"
                                class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                @if ($tasks->status === 'Incomplete') checked @endif>
                            <label for="incomplete"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Incomplete</label>
                        </div>
                    </div>
                </div>
                <div>
                    {{-- <button id="edit-button" type="button"
                        class=" mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Edit Task
                    </button> --}}
                    <a href="{{ route('tasks.index') }}" id="cancel-button"
                        class=" mt-5 text-white focus:outline-none bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                        Cancel
                    </a>
                    <button type="submit" id="update-button"
                        class=" mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Task
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script></script>
    {{-- <script>
        const editButton = document.getElementById('edit-button');
        const cancelButton = document.getElementById('cancel-button');
        const updateButton = document.getElementById('update-button');
        const titleInput = document.getElementById('title');
        const descriptionTextarea = document.getElementById('description');

        cancelButton.style.display = 'none';
        updateButton.style.display = 'none';

        editButton.addEventListener('click', function() {
            titleInput.removeAttribute('readonly');
            descriptionTextarea.removeAttribute('readonly');
            updateButton.style.display = 'inline-block';
            cancelButton.style.display = 'inline-block';
            editButton.style.display = 'none';
        });

        cancelButton.addEventListener('click', function() {
            titleInput.setAttribute('readonly', true);
            descriptionTextarea.setAttribute('readonly', true);
            updateButton.style.display = 'none';
            cancelButton.style.display = 'none';
            editButton.style.display = 'inline-block';
        })

    </script> --}}
@endsection
