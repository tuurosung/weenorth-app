@extends('layouts.app')

@section('content')
<x-headers.top-header2 title="District Executives" subtitle="List of all District Executives in the Network">

    <!-- <button class="btn btn-primary">
                <i class="fi fi-rc-plus me-3"></i>
                Add District Executive
            </button> -->

</x-headers.top-header2>


<div class="card border-0">
    <div class="card-body">

        <table class="table table-sm datatables align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Member's Name</th>
                    <th scope="col">Region</th>
                    <th scope="col">District</th>
                    <th scope="col">Position</th>
                    <th class="text-end">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($districtExecutives as $districtExecutive)
                <tr class="">
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $districtExecutive->member->name }}</td>
                    <td>{{ $districtExecutive->district->region->region_name }}</td>
                    <td>{{ $districtExecutive->district->district_name }}</td>
                    <td>{{ $districtExecutive->position_name }}</td>
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

@endsection
