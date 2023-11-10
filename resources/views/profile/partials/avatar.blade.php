<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add or update your Avatar') }}
        </p>
    </header>
    <form id="avatar-upload-form" action="{{  url('/upload-avatar/'.$user->id)  }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="text-center mb-5">
            <div class="avatar avatar-xxl avatar-circle mb-5">
                <label class="d-block cursor-pointer">
                    <i class="bi bi-pencil"></i>
                    <input type="file" name="avatar" class="d-none">
                </label>

                {!! $user->avatarImg !!}
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('input[type="file"]').on('change', function() {
                $(this).closest('form').submit();
            });
        });
    </script>
</section>