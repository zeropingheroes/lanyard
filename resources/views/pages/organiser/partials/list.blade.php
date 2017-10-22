@if( $organisers )
    <table class="table">
        <tr>
            <th>@lang('title.organiser')</th>
            <th>@lang('title.created')</th>
            <th></th>
        </tr>
        @foreach($organisers as $organiser)
            <tr>
                <td>{{ $organiser->name }}</td>
                <td>{{ $organiser->created_at }}</td>
                <td>
                    <form action="{{ route('organiser.destroy', $organiser->id) }}" method="POST">
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