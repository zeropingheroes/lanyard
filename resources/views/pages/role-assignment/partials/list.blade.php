@if( $roleAssignments )
    <table class="table">
        <tr>
            <th>@lang('title.username')</th>
            <th>@lang('title.role')</th>
        </tr>
        @foreach($roleAssignments as $roleAssignment)
            <tr>
                <td>{{ $roleAssignment->user->username }}</td>
                <td>{{ $roleAssignment->role->name }}</td>
            </tr>
        @endforeach
    </table>
@endif