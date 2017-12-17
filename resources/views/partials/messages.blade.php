@if(session()->has('message'))
    <div id="messages">
        <div class="alert alert-{{ session()->get('message_type', 'success') }}" role="alert">
            {{ session()->get('message') }}
        </div>
    </div>
@endif