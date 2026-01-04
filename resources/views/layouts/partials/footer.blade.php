<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-1.4.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>


<!-- ================== BEGIN core-js ================== -->
<script src="{{ asset('js/vendor.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.min.js') }}" type="text/javascript"></script>
<!-- ================== END core-js ================== -->

<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap-modal.js') }}"></script>
<script src="{{ asset('js/toastify.min.js') }}"></script>
<script src="{{ asset('js/bootbox.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/summernote-bs5.js') }}"></script>
<script src="{{ asset('js/summernote-config.js') }}"></script>

<script src="{{ asset('js/rocket.min.js') }}" data-cf-settings="-|49" defer></script>
<script src="{{ asset('js/form-wizard.js') }}"></script>

<script src="{{ asset('js/tag-it.js') }}"></script>



<script src="{{ asset('matdash/js/app.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('matdash/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('matdash/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('matdash/js/sidebarmenu.js') }}" type="text/javascript"></script>
<script src="{{ asset('matdash/js/simplebar.min.js.js') }}" type="text/javascript"></script>
<script src="{{ asset('matdash/js/theme.js') }}" type="text/javascript"></script>

<script src="{{ asset('matdash/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('matdash/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('matdash/js/select2.init.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/weenorth.js') }}"></script>

<script>
    window.routes = {
        'filterDistrictsByRegionId': "{{ route('districts.filter-districts') }}",
        'filterServiceCentersByDistrictId': "{{ route('service-centers.filter-service-centers') }}",
    }
</script>

@stack('scripts')
