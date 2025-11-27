@extends('layouts.app')

@section('content')

    <x-headers.top-header pageTitle="Trade Details">
        <a href="{{ route('trade.index') }}" class="btn btn-secondary">
            <i class="fi fi-br-arrow-left me-3"></i>
            Back to Trades
        </a>
    </x-headers.top-header>

    <ul class="nav nav-tabs card card-body flex-row p-3" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active btn-sm" data-bs-toggle="tab" href="#dashboard" role="tab" aria-selected="true">
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link btn-sm" data-bs-toggle="tab" href="#members" role="tab" aria-selected="false" tabindex="-1">
                <span>Members</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mb-3">{{ $trade->trade_name }}</h3>

                            <div class="mb-4">
                                <h5>Description</h5>
                                <p>{{ $trade->description }}</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Created:</strong> {{ $trade->created_at->format('d M Y, H:i') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Last Updated:</strong> {{ $trade->updated_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('trade.edit', $trade) }}" class="btn btn-primary me-2">
                                    <i class="fi fi-br-pencil me-2"></i>
                                    Edit Trade
                                </a>

                                <form action="{{ route('trade.delete', $trade) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this trade?')">
                                        <i class="fi fi-br-trash me-2"></i>
                                        Delete Trade
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="members" role="tabpanel">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
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
                                @foreach ($trade->tradeswomen as $member)
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
                                                <a class="dropdown-toggle text-decoration-non text-dark" type="button" id="triggerId"
                                                    data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Options
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex make-district-executive"
                                                        data-url="{{ route('network.make-district-executive') }}"
                                                        data-weenorth_id="{{ $member->weenorth_id }}" data-trade_id="{{ $trade->id }}">
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
        </div>
    </div>



@endsection
