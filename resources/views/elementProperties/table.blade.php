<table class="table">
    <thead>
    <th>Id</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Deleted At</th>
			<th>Created User Id</th>
			<th>Updated User Id</th>
			<th>Schema Property Id</th>
			<th>Profile Property Id</th>
			<th>Is Schema Property</th>
			<th>Object</th>
			<th>Related Schema Property Id</th>
			<th>Language</th>
			<th>Status Id</th>
			<th>Is Generated</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($elementProperties as $elementProperty)
        <tr>
            <td>{!! $elementProperty->id !!}</td>
			<td>{!! $elementProperty->created_at !!}</td>
			<td>{!! $elementProperty->updated_at !!}</td>
			<td>{!! $elementProperty->deleted_at !!}</td>
			<td>{!! $elementProperty->created_user_id !!}</td>
			<td>{!! $elementProperty->updated_user_id !!}</td>
			<td>{!! $elementProperty->schema_property_id !!}</td>
			<td>{!! $elementProperty->profile_property_id !!}</td>
			<td>{!! $elementProperty->is_schema_property !!}</td>
			<td>{!! $elementProperty->object !!}</td>
			<td>{!! $elementProperty->related_schema_property_id !!}</td>
			<td>{!! $elementProperty->language !!}</td>
			<td>{!! $elementProperty->status_id !!}</td>
			<td>{!! $elementProperty->is_generated !!}</td>
            <td>
                <a href="{!! route('elementProperties.edit', [$elementProperty->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('elementProperties.delete', [$elementProperty->id]) !!}" onclick="return confirm('Are you sure wants to delete this ElementProperty?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
