@extends('layouts.app')


@section('content')

    <x-headers.top-header2 title="District Details">
        <a href="{{ route('district.index') }}" class="btn btn-danger btn-sm">
            Back to Districts
        </a>
    </x-headers.top-header2>

    @include('partials.errors')

    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs card card-body flex-row p-3" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active btn-sm" data-bs-toggle="tab" href="#dashboard" role="tab" aria-selected="true">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link btn-sm" data-bs-toggle="tab" href="#districts" role="tab" aria-selected="false"
                    tabindex="-1">
                    <span>Districts</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link btn-sm" data-bs-toggle="tab" href="#members" role="tab" aria-selected="false"
                    tabindex="-1">
                    <span>Members</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link btn-sm" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false"
                    tabindex="-1">
                    <span>Resource Centers</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link btn-sm" data-bs-toggle="tab" href="#executives" role="tab" aria-selected="false"
                    tabindex="-1">
                    <span>Executives</span>
                </a>
            </li>
            <li class="nav-item ms-auto" role="presentation">
                <a class="btn btn-primary btn-sm" href="#executives" data-bs-toggle="tab" role="tab" aria-selected="false">
                    <span>Executives</span>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active show" id="dashboard" role="tabpanel">
                <div class="p-0">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card text-bg-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="d-flex flex-column h-100">
                                                <div class="hstack gap-3 mb-5">
                                                    <span
                                                        class="d-flex align-items-center justify-content-center round-48 bg-white rounded flex-shrink-0">
                                                        <i class="fi fi-rr-paper-plane fs-7 text-muted"></i>
                                                        <iconify-icon icon="solar:course-up-outline"
                                                            class="fs-7 text-muted"></iconify-icon>
                                                    </span>
                                                    <h3 class="text-white fs-8 mb-0 text-nowrap">{{ $district->district_name }}
                                                    </h3>
                                                </div>
                                                <div class="mt-5 mt-sm-auto">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <span class="opacity-75 text-white">Total Members</span>
                                                            <h4 class="mb-0 text-white mt-1 text-nowrap fs-13 fw-bolder">
                                                                {{ $district->number_of_members }}
                                                            </h4>
                                                        </div>
                                                        <div class="col-6 border-start border-light"
                                                            style="--bs-border-opacity: .15;">
                                                            <span class="opacity-75 text-white">Districts</span>
                                                            <h4 class="mb-0 text-white mt-1 text-nowrap fs-13 fw-bolder">
                                                                {{ $district->number_of_districts }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-md-end">
                                            <img src="{{ asset('images/case.png') }}" alt="welcome"
                                                class="img-fluid mb-n3 mt-2" width="180">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="d-flex flex-column gap-3">
                                <div class="card rounded-1 h-100 mb-0 bg-info">
                                    <div class="card-body">

                                    </div>
                                </div>
                                <div class="card rounded-1 h-100 mb-0 bg-primary">
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane" id="districts" role="tabpanel">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="tab-pane p-0" id="members" role="tabpanel">
                <div class="card">
                    <div class="card-body">

                        <h4 class="cal-sans fw-500 mb-5">Membership</h4>

                        <table class="table table-sm table-condensed datatables">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Trade</th>
                                    <th scope="col">Region/District</th>
                                    <th scope="col" class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($district->members as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <p class="mb-0 text-sm fs-11px text-primary">
                                                <a href="{{ route('member.show', $member) }}" class="text-primary">
                                                    {{ $member->weenorth_id }}
                                                </a>
                                            </p>
                                            <p class="mb-0">{{ $member->full_name }}</p>
                                        </td>
                                        <td>{{ Str::limit($member->trade?->trade_name ?: 'N/A', 20) }}</td>
                                        <td>
                                            <p class="mb-0 fs-11px">{{ $member->region?->region_name ?: 'N/A' }}</p>
                                            <p class="mb-0">{{ $member->district?->district_name ?: 'N/A' }}</p>

                                        </td>
                                        <td class="text-end align-middle">


                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-decoration-non text-dark" type="button"
                                                    id="triggerId" data-bs-toggle="dropdown" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Options
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                                    <a href="javascript:void(0);"
                                                        class="dropdown-item d-flex make-district-executive"
                                                        data-url="{{ route('network.make-district-executive') }}"
                                                        data-weenorth_id="{{ $member->weenorth_id }}"
                                                        data-district_id="{{ $district->id }}">
                                                        Make Executive
                                                        <i class="fi fi-br-check ms-auto text-primary"></i>
                                                    </a>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane p-0" id="executives" role="tabpanel">
                <div class="card">
                    <div class="card-body">

                        <h4 class="cal-sans fw-500 mb-5">Executives</h4>

                        <div class="table-responsive">
                            <table class="table table-sm datatables">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Member's Name</th>
                                        <th scope="col">Position</th>
                                        <th class="text-end">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($district->executives as $executive)
                                        <tr class="">
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $executive->member->name }}</td>
                                            <td>{{ $executive->position_name }}</td>
                                            <td class="text-end">
                                                <a href="" class="text-danger">
                                                    <i class="fi fi-sr-trash"></i> Remove
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div id="modal_holder"></div>

@endsection
    @push('scripts')
        @vite(['resources/js/modules/districts/show-districts.js'])
    @endpush
