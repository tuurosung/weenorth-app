<div class="card card-body py-3">
    <div class="row align-items-center">
        <div class="col-12">
            <div class="d-sm-flex align-items-center justify-space-between">
                <h4 class="mb-4 mb-sm-0 cal-sans-regular fw-500">{{ $title }}</h4>
                <nav aria-label="breadcrumb" class="ms-auto">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item d-flex align-items-center me-3">
                            <a class="text-muted text-decoration-none d-flex" href="{{ route('dashboard') }}">
                                <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                <i class="fi fi-rr-home"></i>
                            </a>
                        </li>
                        {{ $slot }}
                        <!-- <li class="breadcrumb-item" aria-current="page">
                            <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                Contact Application
                            </span>
                        </li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
