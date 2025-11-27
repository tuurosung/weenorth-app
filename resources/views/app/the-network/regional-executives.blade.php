@extends('layouts.app')


@section('content')
    <x-headers.top-header2 title="Regional Executives">

        <!-- <button class="btn btn-primary btn-sm">
            <i class="fi fi-rc-plus me-3"></i>
            Add Regional Executive
        </button> -->

    </x-headers.top-header2>


        <div class="card border-0">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-sm datatables align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Member's Name</th>
                                <th scope="col">Region</th>
                                <th scope="col">Position</th>
                                <th class="text-end">Options</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($regionalExecutives as $regionalExecutive)

                                <tr class="">
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $regionalExecutive->member->name }}</td>
                                    <td>{{ $regionalExecutive->region->region_name }}</td>
                                    <td>{{ $regionalExecutive->position_name }}</td>
                                    <td class="text-end">
                                        <a href="" class="text-danger">
                                            <i class="fi fi-sr-trash"></i>
                                            Remove
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
        </div>

@endsection
