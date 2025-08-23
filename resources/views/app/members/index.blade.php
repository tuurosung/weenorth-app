@extends('layouts.app')

@section('content')

<x-headers.top-header pageTitle="Members">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newMemberModal">
        <i class="fi fi-br-plus me-3"></i>
        Create Member
    </button>
</x-headers.top-header>

@include('partials.errors')

<div class="card border-0">
    <div class="card-body">
        <table class="table table-sm table-condensed datatables">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Member ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Trade</th>
                    <th scope="col">Region</th>
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
                            {{ $member->member_id }}
                        </a>
                    </td>
                    <td>{{ $member->full_name }}</td>
                    <td>{{ $member->email ?: 'N/A' }}</td>
                    <td>{{ $member->trade?->trade_name ?: 'N/A' }}</td>
                    <td>{{ $member->region?->region_name ?: 'N/A' }}</td>
                    <td>{!! $member->status_badge !!}</td>
                    <td>{{ $member->joined_date->format('d M Y') }}</td>
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
                                <form action="{{ route('member.delete', $member) }}" method="POST"
                                    style="display: inline;">
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
    </div>
</div>

@include('app.members.modals.create')

<div id="modal_holder"></div>

@endsection

@section('js')

<script type="text/javascript">
$(document).ready(function() {

    $(document).on('click', '.table tbody .edit', function(event) {
        event.preventDefault();
        const url = $(this).data('url');

        $.get(url)
            .done(function(response) {
                $('#modal_holder').html(response)
                $('#editMemberModal').modal('show');
            })
            .fail(function() {
                bootbox.alert('Error loading edit form');
            });
    });

    $(document).on('click', '.table tbody .delete', function(event) {
        event.preventDefault()

        const $form = $(this).closest('form')

        bootbox.confirm("Are you sure you want to delete this member?", function(answer) {
            if (answer) {
                $form.submit()
            }
        })
    })


    $(document).on('change', '.region_id', function() {

        let $regionId = $(this).val();
        let $url = "{{ route('districts.filter-districts') }}"
        $modal = $(this).closest('.modal');

        $.ajax({
            url: $url,
            method: 'GET',
            data: {
                regionId: $regionId
            },
            success: function(response) {
                // Handle the successful response
                if (response.status === 'success') {

                    let districts = response.districts;
                    let $districtSelect = $modal.find($('.district_id'));
                    let $options = '<option value="">-- Select District --</option>';

                    $districtSelect.empty();
                    // $districtSelect.append('<option value="">Select a district</option>');

                    $.each(districts, function(key, value) {
                        $options +=
                            `<option value="${value.id}">${value.district_name}</option>`;
                    });

                    $districtSelect.html($options);

                } else {
                    console.error('Error fetching districts:', response.message);
                }
            },
            error: function(xhr) {
                // Handle the error
            }
        })
    })
});
</script>

@endsection
