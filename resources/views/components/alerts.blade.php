@if( session('alerts') )
    @foreach(session('alerts') as $alert)
        <div class="alert alert-{{ $alert['type'] }}">
            {{ $alert['message'] }}
        </div>
    @endforeach
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif