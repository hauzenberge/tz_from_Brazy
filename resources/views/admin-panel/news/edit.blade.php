<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/news/edit/{{ $news->id}}" method="POST">
                        @csrf                      

                        <div class="form-group mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                           
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="text" class="form-label">{{ __('Text') }}</label>
                            <textarea class="form-control" id="text" name="text">{{ $news->text }}</textarea>
                            <x-input-error :messages="$errors->get('text')" class="mt-2" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="photo_link" class="form-label">{{ __('Photo') }}</label>
                            <img src="{{ $news->photo_link }}" class="img-fluid" alt="News Photo">
                            <a href="{{ url('news/regenerate-image/' . $news->id) }}" class="btn btn-primary mt-2">{{ __('Regenerate Photo') }}</a>
                        </div>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary mt-2">{{ __('Update') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>