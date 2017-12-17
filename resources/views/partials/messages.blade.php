@if(session()->has('message'))
    <div id="messages">
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    </div>
@endif