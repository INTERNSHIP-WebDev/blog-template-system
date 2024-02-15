@foreach($permissions as $row)
<tr>
    <td>{{ $row->id}}</td>
    <td>{{ $row->name }}</td>
    <td>{{ $row->detail }}</td>
    <td>{{ $row->price }}</td>
    <td>{{ $row->discount }}</td>
    <td>{{ $row->stock }}</td>
</tr>
@endforeach
<tr>
    <td colspan="5" align="center">
        {!! $permissions->links('permissions.custom') !!}
    </td>
</tr>
