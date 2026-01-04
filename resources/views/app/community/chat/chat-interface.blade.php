@extends('layouts.app')

@section('content')

<div class="card overflow-hidden chat-application">
    <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
        <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-toggle="offcanvas" data-bs-target="#chat-sidebar"
            aria-controls="chat-sidebar">
            <i class="fi fi-rr-menu-burger fs-5"></i>
        </button>
        <form class="position-relative w-100">
            <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact">
            <i class="fi fi-rr-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>
    <div class="d-flex">
        @include('app.community.chat.partials.left-sidebar')
        @include('app.community.chat.partials.chat-container')
        @include('app.community.chat.partials.chat-off-canvas')
    </div>
</div>

@endsection

@vite(['resources/js/modules/chat/chat.js'])
