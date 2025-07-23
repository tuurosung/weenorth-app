@extends('layouts.app')

@section('content')

    <x-headers.top-header pageTitle="Service Centers">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newServiceCenterModal">
            <i class="fi fi-br-plus me-3"></i>
            Create Service Center
        </button>
    </x-headers.top-header>

    @include('partials.errors')

    <div class="card border-0">
        <div class="card-body">
            <table class="table table-sm datatables">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Location</th>
                        <th scope="col">Town/City</th>
                        <th scope="col">District</th>
                        <th scope="col">Region</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($serviceCenters) && !$serviceCenters->isEmpty())
                        @foreach ($serviceCenters as $serviceCenter)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $serviceCenter->created_at->format('d M Y') }}</td>
                                <td>{{ $serviceCenter->location }}</td>
                                <td>{{ $serviceCenter->town_city }}</td>
                                <td>{{ $serviceCenter->district->district_name ?? 'N/A' }}</td>
                                <td>{{ $serviceCenter->district->region->region_name ?? 'N/A' }}</td>
                                <td class="text-end">

                                    <a href="{{ route('service-center.show', $serviceCenter) }}" class="me-2">
                                        <i class="fi fi-br-eye me-1"></i>View
                                    </a>

                                    <a href="javascript:void(0)" class="me-2 edit"
                                        data-url="{{ route('service-center.edit', $serviceCenter) }}">
                                        <i class="fi fi-br-pencil me-1"></i> Edit
                                    </a>

                                    <form action="{{ route('service-center.delete', $serviceCenter) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" class="text-danger delete">
                                            <i class="fi fi-br-trash me-1"></i> Delete
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <p class="mb-0">No service centers found.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Service Center Modal -->
    <div class="modal fade" id="newServiceCenterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Create New Service Center
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('service-center.store') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="district_id" class="form-label">Select District</label>
                                    <select class="form-select" name="district_id" id="district_id" required>
                                        <option value="">Choose a district...</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                                {{ $district->district_name }} ({{ $district->region->region_name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location" id="location"
                                        placeholder="e.g. Wa Central Service Center" value="{{ old('location') }}"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="town_city" class="form-label">Town/City</label>
                                    <input type="text" class="form-control" name="town_city" id="town_city"
                                        placeholder="e.g. Wa" value="{{ old('town_city') }}" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number"
                                        placeholder="e.g. +233 39 222 1234" value="{{ old('phone_number') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3"
                                placeholder="Enter the full address" required>{{ old('address') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="e.g. center@weenorth.com" value="{{ old('email') }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="center_representative" class="form-label">Center Representative</label>
                                    <input type="text" class="form-control" name="center_representative"
                                        id="center_representative" placeholder="e.g. John Doe"
                                        value="{{ old('center_representative') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="opening_hours" class="form-label">Opening Hours</label>
                            <input type="text" class="form-control" name="opening_hours" id="opening_hours"
                                placeholder="e.g. Monday-Friday: 8:00 AM - 5:00 PM" value="{{ old('opening_hours') }}" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fi fi-br-check me-3"></i>
                            Create Service Center
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modal_holder"></div>

@endsection

@section('js')

    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('click', '.table tbody .edit', function (event) {
                event.preventDefault();
                const url = $(this).data('url');

                $.get(url)
                    .done(function (response) {
                        $('#modal_holder').html(response)
                        $('#editServiceCenterModal').modal('show');
                    })
                    .fail(function () {
                        bootbox.alert('Error loading edit form');
                    });
            });

            $(document).on('click', '.table tbody .delete', function (event) {
                event.preventDefault()

                const $form = $(this).closest('form')

                bootbox.confirm("Are you sure you want to delete this service center?", function (answer) {
                    if (answer) {
                        $form.submit()
                    }
                })
            })
        });
    </script>

@endsection
