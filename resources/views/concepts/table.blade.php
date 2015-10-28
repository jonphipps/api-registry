<table class="table">
    <thead>
    <th>Id</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Deleted At</th>
			<th>Last Updated</th>
			<th>Created User Id</th>
			<th>Updated User Id</th>
			<th>Uri</th>
			<th>Pref Label</th>
			<th>Vocabulary Id</th>
			<th>Is Top Concept</th>
			<th>Pref Label Id</th>
			<th>Status Id</th>
			<th>Language</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($concepts as $concept)
        <tr>
            <td>{!! $concept->id !!}</td>
			<td>{!! $concept->created_at !!}</td>
			<td>{!! $concept->updated_at !!}</td>
			<td>{!! $concept->deleted_at !!}</td>
			<td>{!! $concept->last_updated !!}</td>
			<td>{!! $concept->created_user_id !!}</td>
			<td>{!! $concept->updated_user_id !!}</td>
			<td>{!! $concept->uri !!}</td>
			<td>{!! $concept->pref_label !!}</td>
			<td>{!! $concept->vocabulary_id !!}</td>
			<td>{!! $concept->is_top_concept !!}</td>
			<td>{!! $concept->pref_label_id !!}</td>
			<td>{!! $concept->status_id !!}</td>
			<td>{!! $concept->language !!}</td>
            <td>
                <a href="{!! route('concepts.edit', [$concept->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('concepts.delete', [$concept->id]) !!}" onclick="return confirm('Are you sure wants to delete this Concept?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
