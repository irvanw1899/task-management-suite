<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex mb-7 items-center justify-between">
                        <input type="text" id="search" class="form-control flex-1 mr-4" placeholder="Search tasks by tittle or due date">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">New Task</a>
                    </div>

                    <!-- Include the modal -->
                    @include('notifications.alert')

                    <div class="container mx-auto">
                        <div class="kanban-board">
                            <!-- Pending Column -->
                            <div class="kanban-column bg-gray-300">
                                <h2 class="font-bold mb-4 flex justify-between items-center">Pending
                                    <span
                                        class="bg-gray-600 text-white rounded-full px-2 py-1 text-xs">{{ $tasks->where('status', 'pending')->count() }}</span>
                                </h2>
                                @foreach ($tasks->where('status', 'pending') as $task)
                                <div class="kanban-card bg-white p-4 mb-3 rounded-lg shadow-sm" data-tittle="{{ $task->tittle }}" data-due-date="{{ $task->due_date }}">
                                    <h5 class="font-semibold">{{ $task->tittle }}</h5>
                                        <p class="desc-card" data-task-id="{{ $task->id }}">{{ $task->description }}</p>
                                        <div class="flex justify-between items-center mt-2">
                                            <span class="text-sm text-gray-600">{{ ucfirst($task->due_date) }}</span>
                                            <span class="text-sm text-gray-600">
                                                <a href="#"
                                                    class="btn btn-info bg-blue-500 text-white rounded small-button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $task->id }}">Edit</a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger bg-red-500 text-white rounded small-button">Delete</button>
                                                </form>
                                            </span>
                                        </div>
                                    </div>
                                    @include('tasks.modals.editModal')
                                    @include('tasks.modals.detailModal')

                                @endforeach
                            </div>

                            <!-- In-Progress Column -->
                            <div class="kanban-column bg-yellow-400">
                                <h2 class="font-bold mb-4 flex justify-between items-center">In-Progress
                                    <span
                                        class="bg-yellow-600 text-white rounded-full px-2 py-1 text-xs">{{ $tasks->where('status', 'in-progress')->count() }}</span>
                                </h2>
                                @foreach ($tasks->where('status', 'in-progress') as $task)
                                <div class="kanban-card bg-white p-4 mb-3 rounded-lg shadow-sm" data-tittle="{{ $task->tittle }}" data-due-date="{{ $task->due_date }}">
                                        <h5 class="font-semibold">{{ $task->tittle }}</h5>
                                        <p class="desc-card" data-task-id="{{ $task->id }}">{{ $task->description }}</p>
                                        <div class="flex justify-between items-center mt-2">
                                            <span class="text-sm text-gray-600">{{ ucfirst($task->due_date) }}</span>
                                            <span class="text-sm text-gray-600">
                                                <a href="#"
                                                    class="btn btn-info bg-blue-500 text-white rounded small-button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $task->id }}">Edit</a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger bg-red-500 text-white rounded small-button">Delete</button>
                                                </form>
                                            </span>
                                        </div>
                                    </div>
                                    @include('tasks.modals.editModal')
                                    @include('tasks.modals.detailModal')

                                @endforeach
                            </div>

                            <!-- Completed Column -->
                            <div class="kanban-column bg-red-400">
                                <h2 class="font-bold mb-4 flex justify-between items-center">Completed
                                    <span
                                        class="bg-red-600 text-white rounded-full px-2 py-1 text-xs">{{ $tasks->where('status', 'completed')->count() }}</span>
                                </h2>
                                @foreach ($tasks->where('status', 'completed') as $task)
                                <div class="kanban-card bg-white p-4 mb-3 rounded-lg shadow-sm" data-tittle="{{ $task->tittle }}" data-due-date="{{ $task->due_date }}">
                                        <h5 class="font-semibold">{{ $task->tittle }}</h5>
                                        <p class="desc-card" data-task-id="{{ $task->id }}">{{ $task->description }}</p>
                                        <div class="flex justify-between items-center mt-2">
                                            <span class="text-sm text-gray-600">{{ ucfirst($task->due_date) }}</span>
                                            <span class="text-sm text-gray-600">
                                                <a href="#"
                                                    class="btn btn-info bg-blue-500 text-white rounded small-button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $task->id }}">Edit</a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger bg-red-500 text-white rounded small-button">Delete</button>
                                                </form>
                                            </span>
                                        </div>
                                    </div>
                                    @include('tasks.modals.editModal')
                                    @include('tasks.modals.detailModal')
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-4">
                            {{ $tasks->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the modal for adding data -->
    @include('tasks.modals.addModal')

    </div>


</x-app-layout>

<!-- Include JavaScript files -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.desc-card').on('click', function() {
            var taskId = $(this).data('task-id');
            $('#detailModal'+taskId).modal('show');
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();

            document.querySelectorAll('.kanban-card').forEach(card => {
                const title = card.getAttribute('data-tittle').toLowerCase();
                const dueDate = card.getAttribute('data-due-date').toLowerCase();

                if (title.includes(query) || dueDate.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
