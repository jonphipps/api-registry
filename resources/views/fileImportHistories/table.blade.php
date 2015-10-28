<table class="table">
    <thead>
    <th>Id</th>
			<th>Created At</th>
			<th>Map</th>
			<th>User Id</th>
			<th>Vocabulary Id</th>
			<th>Schema Id</th>
			<th>File Name</th>
			<th>Source File Name</th>
			<th>File Type</th>
			<th>Batch Id</th>
			<th>Results</th>
			<th>Total Processed Count</th>
			<th>Error Count</th>
			<th>Success Count</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($fileImportHistories as $fileImportHistory)
        <tr>
            <td>{!! $fileImportHistory->id !!}</td>
			<td>{!! $fileImportHistory->created_at !!}</td>
			<td>{!! $fileImportHistory->map !!}</td>
			<td>{!! $fileImportHistory->user_id !!}</td>
			<td>{!! $fileImportHistory->vocabulary_id !!}</td>
			<td>{!! $fileImportHistory->schema_id !!}</td>
			<td>{!! $fileImportHistory->file_name !!}</td>
			<td>{!! $fileImportHistory->source_file_name !!}</td>
			<td>{!! $fileImportHistory->file_type !!}</td>
			<td>{!! $fileImportHistory->batch_id !!}</td>
			<td>{!! $fileImportHistory->results !!}</td>
			<td>{!! $fileImportHistory->total_processed_count !!}</td>
			<td>{!! $fileImportHistory->error_count !!}</td>
			<td>{!! $fileImportHistory->success_count !!}</td>
            <td>
                <a href="{!! route('fileImportHistories.edit', [$fileImportHistory->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('fileImportHistories.delete', [$fileImportHistory->id]) !!}" onclick="return confirm('Are you sure wants to delete this FileImportHistory?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
