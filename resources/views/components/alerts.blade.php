@if( session('alerts') )
    @foreach(session('alerts') as $alert)
        <div class="alert alert-{{ $alert['type'] }}">
            {{ $alert['message'] }}
        </div>
    @endforeach
@endif