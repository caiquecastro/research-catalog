@if(session()->has('message'))
    <div id="messages">
        <div class="alert alert-{{ session()->get('message_type', 'success') }}" role="alert">
            {{ session()->get('message') }}
        </div>
    </div>
@endif

@if ($errors->any())
    <ul class="alert alert-danger list-unstyled">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
