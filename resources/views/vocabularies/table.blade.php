<table class="table">
    <thead>
    <th>Id</th>
			<th>Agent Id</th>
			<th>Created At</th>
			<th>Deleted At</th>
			<th>Last Updated</th>
			<th>Created User Id</th>
			<th>Updated User Id</th>
			<th>Child Updated At</th>
			<th>Child Updated User Id</th>
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
			<th>Languages</th>
			<th>Profile Id</th>
			<th>Ns Type</th>
			<th>Prefixes</th>
			<th>Repos</th>
			<th>Repo</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($vocabularies as $vocabulary)
        <tr>
            <td>{!! $vocabulary->id !!}</td>
			<td>{!! $vocabulary->agent_id !!}</td>
			<td>{!! $vocabulary->created_at !!}</td>
			<td>{!! $vocabulary->deleted_at !!}</td>
			<td>{!! $vocabulary->last_updated !!}</td>
			<td>{!! $vocabulary->created_user_id !!}</td>
			<td>{!! $vocabulary->updated_user_id !!}</td>
			<td>{!! $vocabulary->child_updated_at !!}</td>
			<td>{!! $vocabulary->child_updated_user_id !!}</td>
			<td>{!! $vocabulary->name !!}</td>
			<td>{!! $vocabulary->note !!}</td>
			<td>{!! $vocabulary->uri !!}</td>
			<td>{!! $vocabulary->url !!}</td>
			<td>{!! $vocabulary->base_domain !!}</td>
			<td>{!! $vocabulary->token !!}</td>
			<td>{!! $vocabulary->community !!}</td>
			<td>{!! $vocabulary->last_uri_id !!}</td>
			<td>{!! $vocabulary->status_id !!}</td>
			<td>{!! $vocabulary->language !!}</td>
			<td>{!! $vocabulary->languages !!}</td>
			<td>{!! $vocabulary->profile_id !!}</td>
			<td>{!! $vocabulary->ns_type !!}</td>
			<td>{!! $vocabulary->prefixes !!}</td>
			<td>{!! $vocabulary->repos !!}</td>
			<td>{!! $vocabulary->repo !!}</td>
            <td>
                <a href="{!! route('vocabularies.edit', [$vocabulary->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('vocabularies.delete', [$vocabulary->id]) !!}" onclick="return confirm('Are you sure wants to delete this Vocabulary?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
