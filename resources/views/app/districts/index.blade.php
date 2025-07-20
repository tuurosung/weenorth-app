@extends('layouts.app')


@section('content')

    <x-headers.top-header pageTitle="Districts">

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newDistrictModal">
            <i class="fi fi-br-plus me-3"></i>
            Create District
        </button>

    </x-headers.top-header>

    @include('partials.errors')

    <div class="card border-0">
        <div class="card-body">
            <table class="table table-sm">
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
                    @if(isset($districts) && !$districts->isEmpty())
                        @foreach ($districts as $key => $district)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $district->created_at }}</td>
                                <td>{{ $district->district_name }}</td>
                                <td>{{ $district->region->region_name }}</td>
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
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No districts created yet.</td>
                        </tr>
                    @endif

                </tbody>
            </table>
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

    $(document).on('click', '.table tbody .edit', function(event){
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


    $(document).on('click', '.table tbody .delete', function (event) {
        event.preventDefault()

        const $form = $(this).closest('form')

        bootbox.confirm("Are you sure you want to delete this district?", function (answer){

            if (answer) {
                $form.submit()
            }
        })
    })
});
</script>

@endsection
