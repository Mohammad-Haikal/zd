@if (session()->has('message'))
    <div style="display: none" class="bg-black fixed-bottom p-2 text-center text-white" id="flash-message" role="alert">
        <small class="text-light m-0">
            {{ session('message') }}
        </small>
    </div>
@endif
