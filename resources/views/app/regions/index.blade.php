@extends('layouts.app')


@section('content')

    <x-headers.top-header2 title="Regions">

        @can('admin-only')
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newRegionModal">
                Create Region
            </button>
        @endcan

    </x-headers.top-header2>

    @include('partials.errors')

    <div class="card border-0">
        <div class="card-body">
            <table class="table table-sm datatables">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Region Name</th>
                        <th scope="col">Districts</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($regions as $key => $region)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $region->created_at }}</td>
                        <td>
                            <a href="{{ route('region.show', $region) }}" class="text-underline">
                                {{ $region->region_name }}
                            </a>
                        </td>
                        <td>{{ $region->districts_count }}</td>
                        <td class="text-end">

                            @can('admin-only')
                                <a href="javascript:void(0)" data-url="{{ route('region.edit', $region) }}" class="me-2 text-primary edit">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('region.delete', $region) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0)" class="text-danger delete">
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



    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="newRegionModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Create New Region
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('region.store') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="" class="form-label">Region Name</label>
                            <input type="text" class="form-control" name="region_name" id="region_name"
                                placeholder="eg. Upper West Region" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fi fi-br-check  me-3  "></i>
                            Create Region
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
                $('#editRegionModal').modal('show');
            })
            .fail(function() {
                bootbox.alert('Error loading edit form');
            });
    });


    $(document).on('click', '.table tbody .delete', function (event) {
        event.preventDefault()

        const $form = $(this).closest('form')

        bootbox.confirm("Are you sure you want to delete this region?", function (answer){

            if (answer) {
                $form.submit()
            }
        })
    })
});
</script>

@endsection
