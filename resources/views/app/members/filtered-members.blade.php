<table class="table table-sm table-condensed datatables">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">WEENorth ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Trade</th>
            <th scope="col">Region</th>
            <th scope="col">District</th>
            <th scope="col">Status</th>
            <th scope="col">Joined Date</th>
            <th scope="col" class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($members) && !$members->isEmpty())
            @foreach ($members as $member)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('member.show', $member) }}">
                            {{ $member->weenorth_id }}
                        </a>
                    </td>
                    <td>{{ $member->full_name }}</td>
                    <td>{{ $member->email ?: 'N/A' }}</td>
                    <td>{{ $member->trade?->trade_name ?: 'N/A' }}</td>
                    <td>{{ $member->region?->region_name ?: 'N/A' }}</td>
                    <td>{{ $member->district?->district_name ?: 'N/A' }}</td>
                    <td>{!! $member->status_badge !!}</td>
                    <td>{{ $member->joined_date?->format('d M Y') }}</td>
                    <td class="text-end">


                        <div class="dropdown">
                            <a class="dropdown-toggle text-decoration-non text-dark" type="button" id="triggerId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Options
                            </a>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a href="{{ route('member.show', $member) }}" class="dropdown-item d-flex">
                                    View
                                    <i class="fi fi-br-eye ms-auto text-primary"></i>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item d-flex edit"
                                    data-url="{{ route('member.edit', $member) }}">
                                    Edit
                                    <i class="fi fi-br-pencil ms-auto text-info"></i>
                                </a>
                                <form action="{{ route('member.delete', $member) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0)" class="dropdown-item d-flex delete" type="submit">
                                        Delete
                                        <i class="fi fi-br-trash ms-auto text-danger"></i>
                                    </a>
                                </form>
                            </div>
                        </div>


                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
