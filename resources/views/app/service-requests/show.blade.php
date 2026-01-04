@extends('layouts.app')

@section('content')
    <x-headers.top-header2 :title="'Service Requests'">
        <button class="btn btn-primary btn-sm"><i class="fi fi-rr-print me-2"></i> Print Invoice</button>
        <button class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#assignJobModal">
            <i class="fi fi-rr-user me-2"></i> Assign Job
        </button>
    </x-headers.top-header2>

    <div class="row">
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <div class="col-6 d-flex flex-column justify-content-center">
                            <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid w-100px">
                            <h5 class="cal-sans">WEENORTH NETWORK</h5>
                        </div>
                        <div class="col-4 fs-12px">
                            <div class="text-end">
                                024 544 1621
                            </div>
                            <div class="text-end">
                                info@weenorthnetwork.org
                            </div>
                            <div class="text-end">
                                #7 First Floor Far-Habink Storey Building Filling Point,
                                Tamale Gabligbun Junction Choggu Yapalsi
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h3 class="cal-sans fw-500 mb-4">INVOICE</h3>

                    <div class="d-flex justify-content-between">
                        <div class="">
                            <p class="fs-12px">Bill To</p>
                            <h6 class="fw-700 mb-0">{{ $serviceRequest->client_name }}</h6>
                            <h6 class="fw-700">{{ $serviceRequest->client_phone }}</h6>

                        </div>
                        <div class="text-end">

                            <p class="fs-12px">Details</p>

                            <h6>#ID: {{ $serviceRequest->id }}</h6>
                            <h6>{{ \Carbon\Carbon::parse($serviceRequest->created_at)->format('d M Y') }}</h6>

                        </div>
                    </div>



                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th class="text-end">Amount (GHS)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="fw-700 text-end">Total</td>
                                    <td class="text-end fw-700">{{ number_format($serviceRequest->amount, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mt-5">

                            <h6 class="fw-700 text-center">Thank you for your business with us!</h6>

                            <div class="d-flex justify-content-between mt-5">
                                <div>
                                    <p class="mb-0">__________________________</p>
                                    <p class="mb-0">Client's Signature</p>
                                </div>
                                <div>
                                    <p class="mb-0">__________________________</p>
                                    <p class="mb-0">Authorized Signature</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body pb-2">
                    <h4 class="card-title">History</h4>
                </div>
                <ul class="feeds ps-0">
                    <div class="feed-item mb-2 py-2 pe-3 ps-4">
                        <div class="border-start border-2 border-info d-md-flex align-items-center">
                            <div class="d-flex align-items-center gap-6 ms-2">
                                <a href="javascript:void(0)"
                                    class=" round-40 bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                                    <i class="fi fi-rr-bell fs-6"></i>
                                </a>
                                <div class="text-truncate">
                                    <span class="text-dark fw-medium">Created At.</span>
                                </div>
                            </div>
                            <div class="
                                                      justify-content-end
                                                      text-truncate
                                                      ms-5 ms-md-auto
                                                      ps-4 ps-md-0
                                                    ">
                                <span class="fs-2 text-muted">Just Now</span>
                            </div>
                        </div>
                    </div>
                    <div class="feed-item mb-2 py-2 pe-3 ps-4">
                        <div class="border-start border-2 border-success d-md-flex align-items-center">
                            <div class="d-flex align-items-center gap-6 ms-2">
                                <a href="javascript:void(0)"
                                    class=" round-40 bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                                    <i class="fi fi-rr-database fs-6"></i>
                                </a>
                                <div class="text-truncate">
                                    <span class="text-dark fw-medium">Approved At</span>
                                </div>
                            </div>
                            <div class="
                                                      justify-content-end
                                                      text-truncate
                                                      ms-5 ms-md-auto
                                                      ps-4 ps-md-0
                                                    ">
                                <span class="fs-2 text-muted">2 Hr Ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="feed-item mb-2 py-2 pe-3 ps-4">
                        <div class="border-start border-2 border-warning d-md-flex align-items-center">
                            <div class="d-flex align-items-center gap-6 ms-2">
                                <a href="javascript:void(0)"
                                    class=" round-40 bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                                    <i class="fi fi-rr-shopping-cart fs-6"></i>
                                </a>
                                <div class="text-truncate">
                                    <span class="text-dark fw-medium">Assigned At</span>
                                </div>
                            </div>
                            <div class="
                                                      justify-content-end
                                                      text-truncate
                                                      ms-5 ms-md-auto
                                                      ps-4 ps-md-0
                                                    ">
                                <span class="fs-2 text-muted">31 May</span>
                            </div>
                        </div>
                    </div>
                    <div class="feed-item mb-2 py-2 pe-3 ps-4">
                        <div class="border-start border-2 border-danger d-md-flex align-items-center">
                            <div class="d-flex align-items-center gap-6 ms-2">
                                <a href="javascript:void(0)"
                                    class=" round-40 bg-danger-subtle text-danger rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                                    <i class="fi fi-rr-users fs-6"></i>
                                </a>
                                <div class="text-truncate">
                                    <span class="text-dark fw-medium">Completed At</span>
                                </div>
                            </div>
                            <div class="
                                                      justify-content-end
                                                      text-truncate
                                                      ms-5 ms-md-auto
                                                      ps-4 ps-md-0
                                                    ">
                                <span class="fs-2 text-muted">30 May</span>
                            </div>
                        </div>
                    </div>
                    <div class="feed-item mb-2 py-2 pe-3 ps-4">
                        <div class="border-start border-2 border-primary d-md-flex align-items-center">
                            <div class="d-flex align-items-center gap-6 ms-2">
                                <a href="javascript:void(0)"
                                    class=" round-40 bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                                    <i class="fi fi-rr-bell-ring fs-6"></i>
                                </a>
                                <div class="text-truncate">
                                    <span class="text-dark fw-medium">Invoice Payment</span>
                                </div>
                            </div>
                            <div class="justify-content-end text-truncate ms-5 ms-md-auto ps-4 ps-md-0">
                                <span class="fs-2 text-muted">27 May</span>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    @include('app.service-requests.modals.assign-job')

@endsection
