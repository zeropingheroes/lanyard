@if( $venues )
    <table class="table">
        <tr>
            <th>@lang('title.venue')</th>
            <th>@lang('title.address')</th>
            <th>@lang('title.created')</th>
            <th></th>
        </tr>
        @foreach($venues as $venue)
            <tr>
                <td>{{ $venue->name }}</td>
                <td>{{ $venue->address }}</td>
                <td>{{ $venue->created_at }}</td>
                <td>
                    <form action="{{ route('venue.destroy', $venue->id) }}" method="POST">
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