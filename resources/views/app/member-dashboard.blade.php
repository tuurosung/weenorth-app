@extends('layouts.app')


@section('content')
    <section class="mb-5">
        <h5 class="mb-0">Welcome</h5>
        <h3 class="text-primary">{{ Auth::user()->name }}</h3>
    </section>

    <div class="row gx-3 mb-4">
        <div class="col-lg-4 col-xxl-3 col-6">
            <div class="card text-white bg-primary rounded">
                <div class="card-body p-4">
                    <span>
                        <i class="fi fi-rr-briefcase fs-8 text-white"></i>
                    </span>
                    <h3 class="card-title mt-3 mb-0 text-white">450</h3>
                    <p class="card-text text-white fs-3 fw-normal">
                        Job Openings
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-3 col-6">
            <div class="card text-white text-bg-success">
                <div class="card-body p-4">
                    <span>
                        <i class="fi fi-rr-calendar-lines-pen fs-8 text-white"></i>
                    </span>
                    <h3 class="card-title mt-3 mb-0 text-white">50</h3>
                    <p class="card-text text-white fs-3 fw-normal">
                        Upcoming Events
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-3 col-6">
            <div class="card text-white text-bg-warning">
                <div class="card-body p-4">
                    <span>
                        <i class="fi fi-rr-tools fs-8 text-white"></i>
                    </span>
                    <h3 class="card-title mt-3 mb-0 text-white">80</h3>
                    <p class="card-text text-white fs-3 fw-normal">
                        Service Requests
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-3 col-6">
            <div class="card text-white text-bg-danger">
                <div class="card-body p-4">
                    <span>
                        <i class="fi fi-rr-user-suitcase fs-8 text-white"></i>
                    </span>
                    <h3 class="card-title mt-3 mb-0 text-white">15</h3>
                    <p class="card-text text-white-50 fs-3 fw-normal">
                        My Jobs
                    </p>
                </div>
            </div>
        </div>
    </div>


        <div class="row">
            <div class="col-md-6">
                <div class="card border-0" style="min-height: 500px">
                    <div class="card-body">
                        <h5>Service Requests</h5>
                        <hr>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card border-0" style="min-height: 500px">
                    <div class="card-body">
                        <h5>Upcoming Events</h5>
                        <hr>
                    </div>
                </div>

            </div>
        </div>

@endsection
