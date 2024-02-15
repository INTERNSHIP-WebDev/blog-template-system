@foreach ($permissions as $permission)
<tr>
    <td class="text-center">{{ $permission->id }}</td>
    <td class="text-center">{{ $permission->name }}</td>
    <td class="text-center">{{ $permission->created_at }}</td>
</tr>
@endforeach
