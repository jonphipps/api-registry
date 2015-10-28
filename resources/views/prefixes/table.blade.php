<table class="table">
    <thead>
    <th>Prefix</th>
			<th>Uri</th>
			<th>Rank</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($prefixes as $prefix)
        <tr>
            <td>{!! $prefix->prefix !!}</td>
			<td>{!! $prefix->uri !!}</td>
			<td>{!! $prefix->rank !!}</td>
            <td>
                <a href="{!! route('prefixes.edit', [$prefix->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('prefixes.delete', [$prefix->id]) !!}" onclick="return confirm('Are you sure wants to delete this Prefix?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
