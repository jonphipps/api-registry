<table class="table">
    <thead>
    <th>Id</th>
			<th>Created At</th>
			<th>Last Updated</th>
			<th>Deleted At</th>
			<th>Nickname</th>
			<th>Salutation</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Sha1 Password</th>
			<th>Salt</th>
			<th>Want To Be Moderator</th>
			<th>Is Moderator</th>
			<th>Is Administrator</th>
			<th>Deletions</th>
			<th>Password</th>
			<th>Culture</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->id !!}</td>
			<td>{!! $user->created_at !!}</td>
			<td>{!! $user->last_updated !!}</td>
			<td>{!! $user->deleted_at !!}</td>
			<td>{!! $user->nickname !!}</td>
			<td>{!! $user->salutation !!}</td>
			<td>{!! $user->first_name !!}</td>
			<td>{!! $user->last_name !!}</td>
			<td>{!! $user->email !!}</td>
			<td>{!! $user->sha1_password !!}</td>
			<td>{!! $user->salt !!}</td>
			<td>{!! $user->want_to_be_moderator !!}</td>
			<td>{!! $user->is_moderator !!}</td>
			<td>{!! $user->is_administrator !!}</td>
			<td>{!! $user->deletions !!}</td>
			<td>{!! $user->password !!}</td>
			<td>{!! $user->culture !!}</td>
            <td>
                <a href="{!! route('users.edit', [$user->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('users.delete', [$user->id]) !!}" onclick="return confirm('Are you sure wants to delete this User?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
