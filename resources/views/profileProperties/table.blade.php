<table class="table">
    <thead>
    <th>Id</th>
			<th>Skos Id</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Deleted At</th>
			<th>Created By</th>
			<th>Updated By</th>
			<th>Deleted By</th>
			<th>Profile Id</th>
			<th>Skos Parent Id</th>
			<th>Name</th>
			<th>Label</th>
			<th>Definition</th>
			<th>Comment</th>
			<th>Type</th>
			<th>Uri</th>
			<th>Status Id</th>
			<th>Language</th>
			<th>Note</th>
			<th>Display Order</th>
			<th>Export Order</th>
			<th>Picklist Order</th>
			<th>Examples</th>
			<th>Is Required</th>
			<th>Is Reciprocal</th>
			<th>Is Singleton</th>
			<th>Is In Picklist</th>
			<th>Is In Export</th>
			<th>Inverse Profile Property Id</th>
			<th>Is In Class Picklist</th>
			<th>Is In Property Picklist</th>
			<th>Is In Rdf</th>
			<th>Is In Xsd</th>
			<th>Is Attribute</th>
			<th>Has Language</th>
			<th>Is Object Prop</th>
			<th>Is In Form</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($profileProperties as $profileProperty)
        <tr>
            <td>{!! $profileProperty->id !!}</td>
			<td>{!! $profileProperty->skos_id !!}</td>
			<td>{!! $profileProperty->created_at !!}</td>
			<td>{!! $profileProperty->updated_at !!}</td>
			<td>{!! $profileProperty->deleted_at !!}</td>
			<td>{!! $profileProperty->created_by !!}</td>
			<td>{!! $profileProperty->updated_by !!}</td>
			<td>{!! $profileProperty->deleted_by !!}</td>
			<td>{!! $profileProperty->profile_id !!}</td>
			<td>{!! $profileProperty->skos_parent_id !!}</td>
			<td>{!! $profileProperty->name !!}</td>
			<td>{!! $profileProperty->label !!}</td>
			<td>{!! $profileProperty->definition !!}</td>
			<td>{!! $profileProperty->comment !!}</td>
			<td>{!! $profileProperty->type !!}</td>
			<td>{!! $profileProperty->uri !!}</td>
			<td>{!! $profileProperty->status_id !!}</td>
			<td>{!! $profileProperty->language !!}</td>
			<td>{!! $profileProperty->note !!}</td>
			<td>{!! $profileProperty->display_order !!}</td>
			<td>{!! $profileProperty->export_order !!}</td>
			<td>{!! $profileProperty->picklist_order !!}</td>
			<td>{!! $profileProperty->examples !!}</td>
			<td>{!! $profileProperty->is_required !!}</td>
			<td>{!! $profileProperty->is_reciprocal !!}</td>
			<td>{!! $profileProperty->is_singleton !!}</td>
			<td>{!! $profileProperty->is_in_picklist !!}</td>
			<td>{!! $profileProperty->is_in_export !!}</td>
			<td>{!! $profileProperty->inverse_profile_property_id !!}</td>
			<td>{!! $profileProperty->is_in_class_picklist !!}</td>
			<td>{!! $profileProperty->is_in_property_picklist !!}</td>
			<td>{!! $profileProperty->is_in_rdf !!}</td>
			<td>{!! $profileProperty->is_in_xsd !!}</td>
			<td>{!! $profileProperty->is_attribute !!}</td>
			<td>{!! $profileProperty->has_language !!}</td>
			<td>{!! $profileProperty->is_object_prop !!}</td>
			<td>{!! $profileProperty->is_in_form !!}</td>
            <td>
                <a href="{!! route('profileProperties.edit', [$profileProperty->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('profileProperties.delete', [$profileProperty->id]) !!}" onclick="return confirm('Are you sure wants to delete this ProfileProperty?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
