@if( $events )
    <table class="table">
        <tr>
            <th>@lang('title.name')</th>
            <th>@lang('title.organiser')</th>
            <th>@lang('title.venue')</th>
            <th>@lang('title.capacity')</th>
            <th>@lang('title.start')</th>
            <th>@lang('title.end')</th>
            <th></th>
        </tr>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->organiser->name }}</td>
                <td>{{ $event->venue->name }}</td>
                <td>{{ $event->capacity }}</td>
                <td>{{ $event->start }}</td>
                <td>{{ $event->end }}</td>
                <td>
                    <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-xs btn-default" aria-label="@lang('title.delete')">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endif