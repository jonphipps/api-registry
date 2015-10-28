<table class="table">
    <thead>
    <th>Id</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Deleted At</th>
			<th>Last Updated</th>
			<th>Created User Id</th>
			<th>Updated User Id</th>
			<th>Concept Id</th>
			<th>Primary Pref Label</th>
			<th>Skos Property Id</th>
			<th>Object</th>
			<th>Scheme Id</th>
			<th>Related Concept Id</th>
			<th>Language</th>
			<th>Status Id</th>
			<th>Is Concept Property</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($conceptProperties as $conceptProperty)
        <tr>
            <td>{!! $conceptProperty->id !!}</td>
			<td>{!! $conceptProperty->created_at !!}</td>
			<td>{!! $conceptProperty->updated_at !!}</td>
			<td>{!! $conceptProperty->deleted_at !!}</td>
			<td>{!! $conceptProperty->last_updated !!}</td>
			<td>{!! $conceptProperty->created_user_id !!}</td>
			<td>{!! $conceptProperty->updated_user_id !!}</td>
			<td>{!! $conceptProperty->concept_id !!}</td>
			<td>{!! $conceptProperty->primary_pref_label !!}</td>
			<td>{!! $conceptProperty->skos_property_id !!}</td>
			<td>{!! $conceptProperty->object !!}</td>
			<td>{!! $conceptProperty->scheme_id !!}</td>
			<td>{!! $conceptProperty->related_concept_id !!}</td>
			<td>{!! $conceptProperty->language !!}</td>
			<td>{!! $conceptProperty->status_id !!}</td>
			<td>{!! $conceptProperty->is_concept_property !!}</td>
            <td>
                <a href="{!! route('conceptproperties.edit', [$conceptProperty->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('conceptproperties.delete', [$conceptProperty->id]) !!}" onclick="return confirm('Are you sure wants to delete this ConceptProperty?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
