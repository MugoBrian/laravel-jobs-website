<div id="success-alert" class="bg-green-100 border border-green-400 mb-4 text-green-700 px-4 py-3 rounded relative"
    role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ Session::get('success') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg id="close-success-alert" class="fill-current h-6 w-6 text-green-500" role="button"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path fill-rule="evenodd"
                d="M14.354 5.646a.5.5 0 1 0-.708-.708L10 9.293 6.354 5.646a.5.5 0 0 0-.708.708L9.293 10l-3.647 3.646a.5.5 0 1 0 .708.708L10 10.707l3.646 3.647a.5.5 0 0 0 .708-.708L10.707 10l3.647-3.646z"
                clip-rule="evenodd" />
        </svg>
    </span>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('success-alert');
            const closeBtn = document.getElementById('close-success-alert');

            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    successAlert.style.display = 'none';
                });
            }
        });
    </script>
@endpush
