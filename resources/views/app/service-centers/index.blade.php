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
                        @foreach ($serviceCenters as $serviceCenter)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
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
                </tbody>
            </table>
        </div>
    </div>


    @include('app.service-centers.modals.create')
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
