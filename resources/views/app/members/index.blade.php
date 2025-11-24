@extends('layouts.app')

@section('content')

<x-headers.top-header2 title="Members">
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newMemberModal">
        Register Member
    </button>
</x-headers.top-header2>


@include('partials.errors')

<div class="card border-0">
    <div class="card-body">

        <h4>Filter Members</h4>

        <div class="d-flex mb-5 gap-4 parentContainer">
            <div class="col-2">
                <div class="mb-3">
                    <label for="filterByRegion" class="form-label">Regions</label>
                    <select class="form-select select2-input select2 region_id" name="filterByRegion"
                        id="filterByRegion">
                        <option value="">-- Select Region ---</option>
                        @foreach ($regions as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label for="filterByRegion" class="form-label">Districts</label>
                    <select class="form-select select2-input district_id" name="filterByDistrict" id="filterByDistrict">
                        <option value="">-- Select District ---</option>
                        @foreach ($districts as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label for="filterByRegion" class="form-label">Trades</label>
                    <select class="form-select select2-input" name="filterByTrade" id="filterByTrade">
                        <option value="">-- Select Trades ---</option>
                        @foreach ($trades as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div></div>
        </div>

        <div id="data_holder">
            <table class="table table-sm table-condensed datatables">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Trade</th>
                        <th scope="col">Region/District</th>
                        <th scope="col">Joined Date</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <p class="mb-0 text-sm fs-11px text-primary">
                                <a href="{{ route('member.show', $member) }}" class="text-primary">
                                    {{ $member->weenorth_id }}
                                </a>
                            </p>
                            <p class="mb-0">{{ $member->full_name }}</p>
                        </td>
                        <td>{{ Str::limit($member->trade?->trade_name ?: 'N/A',20) }}</td>
                        <td>
                            <p class="mb-0 fs-11px">{{ $member->region?->region_name ?: 'N/A' }}</p>
                            <p class="mb-0">{{ $member->district?->district_name ?: 'N/A' }}</p>

                        </td>
                        <td>{{ $member->joined_date?->format('d M Y') }}</td>
                        <td class="text-end align-middle">


                            <div class="dropdown">
                                <a class="dropdown-toggle text-decoration-non text-dark" type="button" id="triggerId"
                                    data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
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
                </tbody>
            </table>
        </div>


    </div>
</div>

@include('app.members.modals.create')

<div id="modal_holder"></div>

@endsection

@section('js')

<script type="text/javascript">
$(document).ready(function() {

    $('#filterByRegion, #filterByDistrict, #filterByTrade').change(filterMembers);


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
        let $modal = $(this).closest('.parentContainer');

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


    function filterMembers() {
        let $regionId = $('#filterByRegion').val();
        let $districtId = $('#filterByDistrict').val();
        let $tradeId = $('#filterByTrade').val();

        let $url = "{{ route('member.filter') }}"
        $.get($url, {
            regionId: $regionId,
            districtId: $districtId,
            tradeId: $tradeId
        }, function(response) {
            $('#data_holder').html(response)
        })
    }
});
</script>

@endsection
