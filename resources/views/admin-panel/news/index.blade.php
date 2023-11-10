<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('News') }} <a href="{{ url('news/create') }}"><i class="bi bi-plus"></i></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Text</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $new)
                            <tr>
                                <th scope="row">{{ $new->id }}</th>
                                <td>
                                    <img src="{{ $new->photo_link }}">
                                </td>
                                <td>
                                    <strong>{{ $new->title }}</strong>
                                </td>
                                <td>{{ $new->text }}</td>
                                <td>
                                    <a href="{{ url('news/edit/' . $new->id) }}" style="color: blue;"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ url('news/delete/' . $new->id) }}" style="color: red;"> <i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>