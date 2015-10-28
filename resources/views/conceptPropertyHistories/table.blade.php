<table class="table">
    <thead>
    <th>Id</th>
			<th>Created At</th>
			<th>Action</th>
			<th>Concept Property Id</th>
			<th>Concept Id</th>
			<th>Vocabulary Id</th>
			<th>Skos Property Id</th>
			<th>Object</th>
			<th>Scheme Id</th>
			<th>Related Concept Id</th>
			<th>Language</th>
			<th>Status Id</th>
			<th>Created User Id</th>
			<th>Change Note</th>
			<th>Import Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($conceptPropertyHistories as $conceptPropertyHistory)
        <tr>
            <td>{!! $conceptPropertyHistory->id !!}</td>
			<td>{!! $conceptPropertyHistory->created_at !!}</td>
			<td>{!! $conceptPropertyHistory->action !!}</td>
			<td>{!! $conceptPropertyHistory->concept_property_id !!}</td>
			<td>{!! $conceptPropertyHistory->concept_id !!}</td>
			<td>{!! $conceptPropertyHistory->vocabulary_id !!}</td>
			<td>{!! $conceptPropertyHistory->skos_property_id !!}</td>
			<td>{!! $conceptPropertyHistory->object !!}</td>
			<td>{!! $conceptPropertyHistory->scheme_id !!}</td>
			<td>{!! $conceptPropertyHistory->related_concept_id !!}</td>
			<td>{!! $conceptPropertyHistory->language !!}</td>
			<td>{!! $conceptPropertyHistory->status_id !!}</td>
			<td>{!! $conceptPropertyHistory->created_user_id !!}</td>
			<td>{!! $conceptPropertyHistory->change_note !!}</td>
			<td>{!! $conceptPropertyHistory->import_id !!}</td>
            <td>
                <a href="{!! route('conceptpropertyhistory.edit', [$conceptPropertyHistory->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('conceptpropertyhistory.delete', [$conceptPropertyHistory->id]) !!}" onclick="return confirm('Are you sure wants to delete this ConceptPropertyHistory?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
