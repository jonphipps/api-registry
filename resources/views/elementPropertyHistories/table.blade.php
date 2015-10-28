<table class="table">
    <thead>
    <th>Id</th>
			<th>Created At</th>
			<th>Created User Id</th>
			<th>Action</th>
			<th>Schema Property Element Id</th>
			<th>Schema Property Id</th>
			<th>Schema Id</th>
			<th>Profile Property Id</th>
			<th>Object</th>
			<th>Related Schema Property Id</th>
			<th>Language</th>
			<th>Status Id</th>
			<th>Change Note</th>
			<th>Import Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($elementPropertyHistories as $elementPropertyHistory)
        <tr>
            <td>{!! $elementPropertyHistory->id !!}</td>
			<td>{!! $elementPropertyHistory->created_at !!}</td>
			<td>{!! $elementPropertyHistory->created_user_id !!}</td>
			<td>{!! $elementPropertyHistory->action !!}</td>
			<td>{!! $elementPropertyHistory->schema_property_element_id !!}</td>
			<td>{!! $elementPropertyHistory->schema_property_id !!}</td>
			<td>{!! $elementPropertyHistory->schema_id !!}</td>
			<td>{!! $elementPropertyHistory->profile_property_id !!}</td>
			<td>{!! $elementPropertyHistory->object !!}</td>
			<td>{!! $elementPropertyHistory->related_schema_property_id !!}</td>
			<td>{!! $elementPropertyHistory->language !!}</td>
			<td>{!! $elementPropertyHistory->status_id !!}</td>
			<td>{!! $elementPropertyHistory->change_note !!}</td>
			<td>{!! $elementPropertyHistory->import_id !!}</td>
            <td>
                <a href="{!! route('elementPropertyHistories.edit', [$elementPropertyHistory->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('elementPropertyHistories.delete', [$elementPropertyHistory->id]) !!}" onclick="return confirm('Are you sure wants to delete this ElementPropertyHistory?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
