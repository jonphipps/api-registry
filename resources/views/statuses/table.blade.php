<table class="table">
    <thead>
    <th>Id</th>
			<th>Display Order</th>
			<th>Display Name</th>
			<th>Uri</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($statuses as $status)
        <tr>
            <td>{!! $status->id !!}</td>
			<td>{!! $status->display_order !!}</td>
			<td>{!! $status->display_name !!}</td>
			<td>{!! $status->uri !!}</td>
            <td>
                <a href="{!! route('statuses.edit', [$status->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('statuses.delete', [$status->id]) !!}" onclick="return confirm('Are you sure wants to delete this Status?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
