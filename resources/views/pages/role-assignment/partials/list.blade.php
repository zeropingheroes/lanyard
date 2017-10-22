@if( $roleAssignments )
    <table class="table">
        <tr>
            <th>@lang('title.user')</th>
            <th>@lang('title.role')</th>
            <th></th>
        </tr>
        @foreach($roleAssignments as $roleAssignment)
            <tr>
                <td>{{ $roleAssignment->user->username }}</td>
                <td>{{ $roleAssignment->role->name }}</td>
                <td>
                    <form action="{{ route('role-assignment.destroy', $roleAssignment->id) }}" method="POST">
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