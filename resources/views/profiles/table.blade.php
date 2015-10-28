<table class="table">
    <thead>
    <th>Id</th>
			<th>Agent Id</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Deleted At</th>
			<th>Created By</th>
			<th>Updated By</th>
			<th>Deleted By</th>
			<th>Child Updated At</th>
			<th>Child Updated By</th>
			<th>Name</th>
			<th>Note</th>
			<th>Uri</th>
			<th>Url</th>
			<th>Base Domain</th>
			<th>Token</th>
			<th>Community</th>
			<th>Last Uri Id</th>
			<th>Status Id</th>
			<th>Language</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($profiles as $profile)
        <tr>
            <td>{!! $profile->id !!}</td>
			<td>{!! $profile->agent_id !!}</td>
			<td>{!! $profile->created_at !!}</td>
			<td>{!! $profile->updated_at !!}</td>
			<td>{!! $profile->deleted_at !!}</td>
			<td>{!! $profile->created_by !!}</td>
			<td>{!! $profile->updated_by !!}</td>
			<td>{!! $profile->deleted_by !!}</td>
			<td>{!! $profile->child_updated_at !!}</td>
			<td>{!! $profile->child_updated_by !!}</td>
			<td>{!! $profile->name !!}</td>
			<td>{!! $profile->note !!}</td>
			<td>{!! $profile->uri !!}</td>
			<td>{!! $profile->url !!}</td>
			<td>{!! $profile->base_domain !!}</td>
			<td>{!! $profile->token !!}</td>
			<td>{!! $profile->community !!}</td>
			<td>{!! $profile->last_uri_id !!}</td>
			<td>{!! $profile->status_id !!}</td>
			<td>{!! $profile->language !!}</td>
            <td>
                <a href="{!! route('profiles.edit', [$profile->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('profiles.delete', [$profile->id]) !!}" onclick="return confirm('Are you sure wants to delete this Profile?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
