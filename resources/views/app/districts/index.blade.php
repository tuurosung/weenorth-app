@extends('layouts.app')


@section('content')

    <x-headers.top-header2 title="Districts">

        @can('admin-only')
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newDistrictModal">
                Create District
            </button>
        @endcan

    </x-headers.top-header2>

    @include('partials.errors')

    <div class="card border-0">
        <div class="card-body">

            <div class="d-flex mb-4">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Filter By Region</label>
                        <select class="form-select" name="filterRegion" id="filterRegion">

                            <option value="">--- Select Region ---</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div></div>
                <div></div>
            </div>

            <div id="data_holder">

                <table class="table table-sm datatables">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">District Name</th>
                            <th scope="col">Region</th>
                            <th scope="col" class="text-center">Members</th>
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
                            <td class="text-center">{{ $district->member_count }}</td>
                            <td class="text-end">

                            @can('admin-only')
<a href="javascript:void(0)" data-url="{{ route('district.edit', $district) }}"
                                    class="me-2 edit">
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
                            @endcan


                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>



    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="newDistrictModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Create New District
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('district.store') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="region_id" class="form-label">Select Region</label>
                            <select class="form-select" name="region_id" id="region_id" required>
                                <option value="">Choose a region...</option>
                                @foreach($regions as $region)
                                <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                    {{ $region->region_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="district_name" class="form-label">District Name</label>
                            <input type="text" class="form-control" name="district_name" id="district_name"
                                placeholder="eg. Wa Municipal" value="{{ old('district_name') }}" required />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fi fi-br-check  me-3  "></i>
                            Create District
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
$(document).ready(function() {

    $(document).on('click', '.table tbody .edit', function(event) {
        event.preventDefault();
        const url = $(this).data('url');

        $.get(url)
            .done(function(response) {
                $('#modal_holder').html(response)
                $('#editDistrictModal').modal('show');
            })
            .fail(function() {
                bootbox.alert('Error loading edit form');
            });
    });


    $(document).on('click', '.table tbody .delete', function(event) {
        event.preventDefault()

        const $form = $(this).closest('form')

        bootbox.confirm("Are you sure you want to delete this district?", function(answer) {

            if (answer) {
                $form.submit()
            }
        })
    })


    $('#filterRegion').on('change', function() {

        const regionId = $(this).val();

        let $url = "{{ route('districts.filter-districts-list') }}"

        $.get($url, {
            regionId: regionId
        }, function(data) {
            $('#data_holder').html(data);
        });
    })
});
</script>

@endsection
