<!--
    *
    * Bio Page
    *
  -->
@php
    $bio = $currentUser->bio;
@endphp

<div class="my-5">

    <h1 class="cal-sans-regular text-capitalize fw-600 display-5">
        <span>{{ $bio->firstname ?? 'Jane' }}</span>
        <span class="text-warning">{{ $bio->lastname ?? 'Doe' }}</span>
    </h1>

    <hr class="bordertop border-2 opacity-100 border-warning">

    <div class="d-flex justify-content-between">
        <div></div>
        <div>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editBioModal">
                <i class="fi fi-rr-pencil"></i> Edit Bio
            </a>

        </div>
    </div>


    <div class="row mb-4">
        <div class="col-md-2">
            <div class="d-flex ">
                <div class="d-flex justify-content-center align-items-center me-3">
                    <i class="fi fi-rr-phone-call fa-2x"></i>
                </div>
                <div class="d-flex flex-column">
                    <div>Phone</div>
                    <div>{{ $bio->phone }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex ">
                <div class="d-flex justify-content-center align-items-center me-3">
                    <i class="fi fi-rr-envelope fa-2x"></i>
                </div>
                <div class="d-flex flex-column">
                    <div>Email</div>
                    <div>{{ $bio->email }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex">
                <div class="d-flex justify-content-center align-items-center me-3">
                    <i class="fi fi-rr-marker fa-2x"></i>
                </div>
                <div class="d-flex flex-column ">
                    <div>Address</div>
                    <div>{{ $bio->residential_address }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>


    <div class="">{{ $bio->personal_statement }}</div>

</div>
