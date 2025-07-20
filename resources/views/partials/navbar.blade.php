<!-- BEGIN #header -->
<div id="header" class="app-header navbar navbar-expand-lg p-0">
    <div class="container-fluid px-5 px-lg-5">
        <button class="navbar-toggler border-0 p-0 me-3 fs-24px shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent">
            <span class="h-2px w-25px bg-gray-500 d-block mb-1"></span>
            <span class="h-2px w-25px bg-gray-500 d-block"></span>
        </button>
        <a class="navbar-brand d-flex align-items-center position-relative me-auto" href="index.html">
            <img src="{{ asset('images/logo.png') }}" class="invert-dark" alt="" height="32">
        </a>
        <div class="collapse navbar-collapse" id="navbarContent">
            <div class="navbar-nav ms-auto mb-2 mb-lg-0 fw-400 inter">
                <div class="nav-item me-2">
                    <a href="#home" class="nav-link">Home</a>
                </div>
                <div class="nav-item me-2">
                    <a href="#about" class="nav-link">The Network</a>
                </div>
                <div class="nav-item me-2">
                    <a href="#pricing" class="nav-link">Resources</a>
                </div>
                <div class="nav-item me-2">
                    <a href="#pricing" class="nav-link">News</a>
                </div>
                <div class="nav-item me-2">
                    <a href="#testimonials" class="nav-link">Impact Stories</a>
                </div>
                <div class="nav-item me-2">
                    <a href="#contact" class="nav-link">Contact</a>
                </div>
            </div>
        </div>
        <div class="ms-3">
            <a href="{{ route('login') }}" class="btn btn-purple text-white  fw-bold  px-3 py-2 border-0">
                <i class="fi fi-sr-lock me-2 align-middle"></i>
                Login
            </a>
        </div>
    </div>
</div>
<!-- END #header -->
