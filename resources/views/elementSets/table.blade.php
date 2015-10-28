<table class="table">
    <thead>
    <th>Id</th>
			<th>Agent Id</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Deleted At</th>
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
			<th>Profile Id</th>
			<th>Ns Type</th>
			<th>Prefixes</th>
			<th>Languages</th>
			<th>Repo</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($elementSets as $elementSet)
        <tr>
            <td>{!! $elementSet->id !!}</td>
			<td>{!! $elementSet->agent_id !!}</td>
			<td>{!! $elementSet->created_at !!}</td>
			<td>{!! $elementSet->updated_at !!}</td>
			<td>{!! $elementSet->deleted_at !!}</td>
			<td>{!! $elementSet->created_user_id !!}</td>
			<td>{!! $elementSet->updated_user_id !!}</td>
			<td>{!! $elementSet->child_updated_at !!}</td>
			<td>{!! $elementSet->child_updated_user_id !!}</td>
			<td>{!! $elementSet->name !!}</td>
			<td>{!! $elementSet->note !!}</td>
			<td>{!! $elementSet->uri !!}</td>
			<td>{!! $elementSet->url !!}</td>
			<td>{!! $elementSet->base_domain !!}</td>
			<td>{!! $elementSet->token !!}</td>
			<td>{!! $elementSet->community !!}</td>
			<td>{!! $elementSet->last_uri_id !!}</td>
			<td>{!! $elementSet->status_id !!}</td>
			<td>{!! $elementSet->language !!}</td>
			<td>{!! $elementSet->profile_id !!}</td>
			<td>{!! $elementSet->ns_type !!}</td>
			<td>{!! $elementSet->prefixes !!}</td>
			<td>{!! $elementSet->languages !!}</td>
			<td>{!! $elementSet->repo !!}</td>
            <td>
                <a href="{!! route('elementsets.edit', [$elementSet->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('elementsets.delete', [$elementSet->id]) !!}" onclick="return confirm('Are you sure wants to delete this ElementSet?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
