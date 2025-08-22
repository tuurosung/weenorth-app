@extends('layouts.app')


@section('content')

    <x-headers.top-header pageTitle="Service Requests">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newServiceRequest">
            <i class="fi fi-rc-plus me-3"></i>
            New Request
        </button>
    </x-headers.top-header>

    @include('partials.errors')



    <div class="card border-0">
        <div class="card-body">

            <table class="table datatables table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Service Center</th>
                        <th scope="col">Region</th>
                        <th scope="col">District</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($serviceRequests as $serviceRequest)
                        <tr class="">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $serviceRequest->client_name }}</td>
                            <td>{{ $serviceRequest->client_email }}</td>
                            <td>{{ $serviceRequest->client_phone }}</td>
                            <td>{{ $serviceRequest->serviceCenter->location ?? 'N/A' }}</td>
                            <td>{{ $serviceRequest->region->region_name ?? 'N/A' }}</td>
                            <td>{{ $serviceRequest->district->district_name ?? 'N/A' }}</td>
                            <td class="{{ $serviceRequest->status_colour }}">{{ $serviceRequest->status }}</td>
                            <td class="text-end">

                                <div class="dropdown">
                                    <a class="dropdown-toggle text-decoration-none text-dark" type="button" id="triggerId"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Option
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <a class="dropdown-item d-flex" href="#">
                                            View
                                            <i class="fi fi-br-eye text-info ms-auto"></i>
                                        </a>
                                        <form method="POST" action="{{  route('service-requests.approve-request', $serviceRequest) }}">
                                            @csrf
                                            @method('PATCH')
                                            <a class="dropdown-item d-flex approve-request" href="javascript:void(0)">
                                                Accept
                                                <i class="fi fi-br-check text-success ms-auto"></i>
                                            </a>
                                        </form>
                                        <form method="POST" action="{{  route('service-requests.reject-request', $serviceRequest) }}">
                                            @csrf
                                            @method('PATCH')
                                            <a class="dropdown-item d-flex reject-request" href="javascript:void(0)">
                                                Reject
                                                <i class="fi fi-br-x text-danger ms-auto"></i>
                                            </a>
                                        </form>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item d-flex edit-request" href="javascript:void(0)" data-url="{{ route('service-requests.edit', $serviceRequest) }}">
                                            Edit
                                            <i class="fi fi-br-pencil text-primary ms-auto"></i>
                                        </a>
                                        <form method="POST" action="{{ route('service-requests.destroy', $serviceRequest) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="dropdown-item d-flex delete-request" href="#">
                                                Delete
                                                <i class="fi fi-br-trash text-danger ms-auto"></i>
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

    @include('app.service-requests.modals.new-request')
    <div id="modal_holder"></div>
@endsection


@section('js')
    <script type="text/javascript">
        $('#service_description').summernote(summernoteConfig)

        $('#region_id').on('change', function () {

            let $regionId = $(this).val();
            let $url = "{{ route('districts.filter-districts') }}"

            $.ajax({
                url: $url,
                method: 'GET',
                data: {
                    regionId: $regionId
                },
                success: function (response) {
                    // Handle the successful response
                    if (response.status === 'success') {

                        let districts = response.districts;
                        let $districtSelect = $('#district_id');
                        let $options = '<option value="">Select District</option>';

                        // $districtSelect.empty();
                        // $districtSelect.append('<option value="">Select a district</option>');

                        $.each(districts, function (key, value) {
                            $options +=
                                `<option value="${value.id}">${value.district_name}</option>`;
                        });

                        $('#district_id').html($options);

                    } else {
                        console.error('Error fetching districts:', response.message);
                    }
                },
                error: function (xhr) {
                    // Handle the error
                }
            })
        })

        $('#district_id').on('change', function () {
            let $districtId = $(this).val();
            let $url = "{{ route('service-centers.filter-service-centers') }}";

            $.ajax({
                url: $url,
                type: 'GET',
                data: {
                    districtId: $districtId
                },
                success: function (response) {
                    // Handle the successful response
                    if (response.status === 'success') {

                        let serviceCenters = response.service_centers;
                        let $serviceCenterSelect = $('#service_center_id');
                        let $options = '<option value="">Select Service Center</option>';

                        $.each(serviceCenters, function (key, value) {
                            $options += `<option value="${value.id}">${value.location}</option>`;
                        });

                        $serviceCenterSelect.html($options);

                    } else {
                        console.error('Error fetching service centers:', response.message);
                    }
                },
                error: function (xhr) {
                    // Handle the error
                }
            })
        });

        $(document).on('click', '.table .edit-request', function() {
            let $url = $(this).data('url');

            $.get($url, function(msg){
                $('#modal_holder').html(msg);
                $('#editRequestModal').modal('show');

                $('#edit_service_description').summernote(summernoteConfig);
            })
        })

        $(document).on('click', '.table .delete-request', function() {
            let $form = $(this).closest('form');

            bootbox.confirm('Are you sure you want to cancel this request?', function(result) {
                if (result) {
                    $form.submit();
                }
            });
        })

        $(document).on('click', '.table .approve-request', function() {
            let $form = $(this).closest('form');

            bootbox.confirm('Are you sure you want to accept this request?', function(result) {
                if (result) {
                    $form.submit();
                }
            });
        })

        $(document).on('click', '.table .reject-request', function() {
            let $form = $(this).closest('form');

            bootbox.confirm('Are you sure you want to reject this request?', function(result) {
                if (result) {
                    $form.submit();
                }
            });
        })
    </script>
@endsection
