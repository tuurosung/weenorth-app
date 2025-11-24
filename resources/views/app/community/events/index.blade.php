@extends('layouts.app')

@section('content')

    <x-headers.top-header2 title="Events">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-toggle="modal"
            data-bs-target="#newEventModal">
            Create Event
        </button>
    </x-headers.top-header2>

    @include('partials.errors')

    <div class="card">
        <div class="card-body">


            <table class="table datatables">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Title</th>
                        <th scope="col">Event Date/Time</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-end">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($networkEvents as $networkEvent)
                        <tr class="">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $networkEvent->created_at }}</td>
                            <td>{{ $networkEvent->title }}</td>
                            <td>{{ $networkEvent->date . ' ' . $networkEvent->time }}</td>
                            <td>{{ $networkEvent->created_by_name }}</td>
                            <td>{{ $networkEvent->status }}</td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" type="button" id="triggerId"
                                        data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Options
                                    </a>
                                    <div class="dropdown-menu shadow-lg" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="#"><i class="fi fi-sr-pencil me-1 text-primary"></i> Edit</a>
                                        <a class="dropdown-item" href="#"><i class="fi fi-sr-trash me-2 text-danger"></i>Delete</a>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @include('app.community.events.modals.create')

@endsection
