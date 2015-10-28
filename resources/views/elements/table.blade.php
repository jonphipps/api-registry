<table class="table">
    <thead>
    <th>Id</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Deleted At</th>
			<th>Created User Id</th>
			<th>Updated User Id</th>
			<th>Schema Id</th>
			<th>Name</th>
			<th>Label</th>
			<th>Definition</th>
			<th>Comment</th>
			<th>Type</th>
			<th>Is Subproperty Of</th>
			<th>Parent Uri</th>
			<th>Uri</th>
			<th>Status Id</th>
			<th>Language</th>
			<th>Note</th>
			<th>Domain</th>
			<th>Orange</th>
			<th>Is Deprecated</th>
			<th>Url</th>
			<th>Lexical Alias</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($elements as $element)
        <tr>
            <td>{!! $element->id !!}</td>
			<td>{!! $element->created_at !!}</td>
			<td>{!! $element->updated_at !!}</td>
			<td>{!! $element->deleted_at !!}</td>
			<td>{!! $element->created_user_id !!}</td>
			<td>{!! $element->updated_user_id !!}</td>
			<td>{!! $element->schema_id !!}</td>
			<td>{!! $element->name !!}</td>
			<td>{!! $element->label !!}</td>
			<td>{!! $element->definition !!}</td>
			<td>{!! $element->comment !!}</td>
			<td>{!! $element->type !!}</td>
			<td>{!! $element->is_subproperty_of !!}</td>
			<td>{!! $element->parent_uri !!}</td>
			<td>{!! $element->uri !!}</td>
			<td>{!! $element->status_id !!}</td>
			<td>{!! $element->language !!}</td>
			<td>{!! $element->note !!}</td>
			<td>{!! $element->domain !!}</td>
			<td>{!! $element->orange !!}</td>
			<td>{!! $element->is_deprecated !!}</td>
			<td>{!! $element->url !!}</td>
			<td>{!! $element->lexical_alias !!}</td>
            <td>
                <a href="{!! route('elements.edit', [$element->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('elements.delete', [$element->id]) !!}" onclick="return confirm('Are you sure wants to delete this Element?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
