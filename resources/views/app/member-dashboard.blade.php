@extends('layouts.app')


@section('content')

<h1 class="mb-5">Welcome, {{ Auth::user()->name }}</h1>

    <div class="row mb-5">
        <div class="col-md-3">

            <div class="card border-0 bg-primary">
                <div class="card-body text-white">
                    <div class="d-flex">
                        <div class="w-25 d-flex align-items-center">
                            <i class="fi fi-rr-briefcase fs-1"></i>
                        </div>
                        <div>
                            <h2 class="text-white mb-0">3</h2>
                            <p class="m-0">Job Openings</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-3">

            <div class="card border-0 bg-danger">
                <div class="card-body text-white">
                    <div class="d-flex">
                        <div class="w-25 d-flex align-items-center">
                            <i class="fi fi-rr-calendar fs-1"></i>
                        </div>
                        <div>
                            <h2 class="text-white mb-0">105</h2>
                            <p class="m-0">Upcoming Events</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-3">

            <div class="card border-0 bg-orange">
                <div class="card-body text-white">
                    <div class="d-flex">
                        <div class="w-25 d-flex align-items-center">
                            <i class="fi fi-rr-transformation-block fs-1"></i>
                        </div>
                        <div>
                            <h2 class="text-white mb-0">5</h2>
                            <p class="m-0">Regions</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-3">

            <div class="card border-0 bg-orange">
                <div class="card-body text-white">
                    <div class="d-flex">
                        <div class="w-25 d-flex align-items-center">
                            <i class="fi fi-rr-transformation-block fs-1"></i>
                        </div>
                        <div>
                            <h2 class="text-white mb-0">51</h2>
                            <p class="m-0">Districts</p>
                        </div>
                    </div>

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
