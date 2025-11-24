<table class="table table-sm datatables">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date Created</th>
            <th scope="col">District Name</th>
            <th scope="col">Region</th>
            <th scope="col" class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($districts as $key => $district)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $district->created_at }}</td>
                <td>
                    <a href="{{ route('district.show', $district) }}" class="text-underline">
                        {{ $district->district_name }}
                    </a>
                </td>
                <td>{{ $district->region?->region_name }}</td>
                <td class="text-end">
                    <a href="{{ route('district.show', $district->id) }}" class="me-2">View</a>
                    <a href="javascript:void(0)" data-url="{{ route('district.edit', $district) }}" class="me-2 edit">
                        <i class="fi fi-br-pencil"></i>
                        Edit
                    </a>
                    <form method="POST" action="{{ route('district.delete', $district) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <a href="javascript:void(0)" class="text-danger delete">
                            <i class="fi fi-br-trash"></i>
                            Delete
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
