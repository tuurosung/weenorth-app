@extends('layouts.app')


@section('content')
    <x-headers.top-header pageTitle="Regional Executives">
        <button class="btn btn-primary">
            <i class="fi fi-rc-plus me-3"></i>Add Regional Executive</button>
    </x-headers.top-header>

    <div class="card border-0">
        <div class="card-body">
            <div
                class="table-responsive"
            >
                <table
                    class="table datatables align-middle mb-0"
                >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">R1C1</td>
                            <td>R1C2</td>
                            <td>R1C3</td>
                        </tr>
                        <tr class="">
                            <td scope="row">Item</td>
                            <td>Item</td>
                            <td>Item</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
