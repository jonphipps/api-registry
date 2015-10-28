<table class="table">
    <thead>
    <th>Id</th>
			<th>Created At</th>
			<th>Last Updated</th>
			<th>Deleted At</th>
			<th>Org Email</th>
			<th>Org Name</th>
			<th>Ind Affiliation</th>
			<th>Ind Role</th>
			<th>Address1</th>
			<th>Address2</th>
			<th>City</th>
			<th>State</th>
			<th>Postal Code</th>
			<th>Country</th>
			<th>Phone</th>
			<th>Web Address</th>
			<th>Type</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($agents as $agent)
        <tr>
            <td>{!! $agent->id !!}</td>
			<td>{!! $agent->created_at !!}</td>
			<td>{!! $agent->last_updated !!}</td>
			<td>{!! $agent->deleted_at !!}</td>
			<td>{!! $agent->org_email !!}</td>
			<td>{!! $agent->org_name !!}</td>
			<td>{!! $agent->ind_affiliation !!}</td>
			<td>{!! $agent->ind_role !!}</td>
			<td>{!! $agent->address1 !!}</td>
			<td>{!! $agent->address2 !!}</td>
			<td>{!! $agent->city !!}</td>
			<td>{!! $agent->state !!}</td>
			<td>{!! $agent->postal_code !!}</td>
			<td>{!! $agent->country !!}</td>
			<td>{!! $agent->phone !!}</td>
			<td>{!! $agent->web_address !!}</td>
			<td>{!! $agent->type !!}</td>
            <td>
                <a href="{!! route('agents.edit', [$agent->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('agents.delete', [$agent->id]) !!}" onclick="return confirm('Are you sure wants to delete this Agent?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
