@extends('layouts.app')

@section('content')

    <x-headers.top-header2 title="Resume Builder">

        <button class="btn btn-primary btn-sm" id="print-resume-btn" data-url="{{ route('resume-builder.print') }}">
            <i class="fi fi-rr-print me-2"></i>
            Print CV
        </button>
    </x-headers.top-header2>

    @include('partials.errors')

    <div class="card">
        <div class="card-body">
            <h4 class="cal-sans ">CURRICULUM VITAE</h4>
            @include('app.resume-builder.pages.bio')

            @include('app.resume-builder.pages.work-experience')

            @include('app.resume-builder.pages.education')

            @include('app.resume-builder.pages.skills')
        </div>
    </div>



    @include('app.resume-builder.modals.education.education')
    @include('app.resume-builder.modals.work.work-experience-modal')
    @include('app.resume-builder.modals.skill.new-skill-modal')
    @include('app.resume-builder.modals.bio.bio-modal')

    <div id="modal_holder"></div>
@endsection



@section('js')

    @vite(['resources/js/modules/resume-builder/resume-builder.js'])
    <!-- Bio Scripts -->
    <script type="text/javascript">

        // Education Functions
        $('#region').on('change', function () {
            let region = $(this).val();
            if (region) {
                $.ajax({
                    url: "{{ route('resume-builder.filter-cities') }}",
                    type: "GET",
                    data: {
                        region: region,
                    },
                    success: function (response) {
                        if (response.status === 'success') {

                            let cities = response.cities;
                            let options = '<option value="">Select City</option>';

                            $.each(cities, function (index, city) {
                                options += `<option value="${city}">${city}</option>`;
                            });
                            $('#city').html(options);
                        } else {
                            $('#city').html('<option value="">No cities found</option>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching cities:', error);
                        $('#city').html('<option value="">Error fetching cities</option>');
                    }
                });
            } else {
                $('#city').html('<option value="">Select Region first</option>');
            }
        });


        $('.edit-education').on('click', function (event) {

            var url = $(this).data('url');

            $.get(url, function (data) {
                $('#modal_holder').html(data);
                $('#editEducationModal').modal('show');
                initializeSelect2();
            }).fail(function () {
                console.error('Error loading education data');
            });
        })


        $('.delete-education').on('click', function (event) {
            event.preventDefault();
            var form = $(this).closest('form');
            bootbox.confirm('Are you sure you want to delete this education record?', function (result) {
                if (result) {
                    form.submit();
                }
            });
        });




        $('a[data-bs-toggle="tab"], a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            const activeTab = $(e.target).attr('href');
            localStorage.setItem('activeTab', activeTab);
            console.log('Tab changed to:', activeTab);
        });
    </script>

    <!-- Work Experience Scripts -->
    <script>
        $('#work_description').summernote(summernoteConfig)

        $('#still_working_here').on('change', function () {

            if ($(this).is(':checked')) {

                $('#to').val('')
                    .attr('disabled', true);
                $('#still_working_here').val(1);

            } else {

                $('#to').attr('disabled', false)
                    .focus()
                $('#still_working_here').val(0);

            }
        })


        $('.edit-work-experience').on('click', function () {
            var url = $(this).data('url');

            $.get(url, function (data) {

                $('#modal_holder').html(data);
                $('#editWorkExperienceModal').modal('show');

                $('#editWorkExperienceModal').on('shown.bs.modal', function () {

                    $('#edit_work_description').summernote(summernoteConfig);

                })

                initializeSelect2();

            }).fail(function () {
                console.error('Error loading work experience data');
            });
        })


        $('.delete-work-experience').on('click', function() {
            var $form = $(this).closest('form');

            bootbox.confirm('Are you sure you want to delete this entry?', function (answer){
                if (answer)
                {
                    $form.submit();
                }
            })
        })

    </script>


    <!-- Skill Scripts -->
    <script type="text/javascript">
        $('.edit-skill').on('click', function () {
            var url = $(this).data('url');

            $.get(url, function (data) {
                $('#modal_holder').html(data);
                $('#editSkillModal').modal('show');
                initializeSelect2();
            }).fail(function () {
                console.error('Error loading skill data');
            });
        });


        $('.delete-skill').on('click', function() {

            var $form = $(this).closest('form');

            bootbox.confirm('Are you sure you want to delete this skill?', function (answer) {
                if (answer) {
                    $form.submit();
                }
            });

        });

        $('#jquery-tagit').tagit({
                fieldName: 'tags',
                availableTags: ['c++', 'java', 'php', 'javascript', 'ruby', 'python', 'c'],
                autocomplete: {
                    delay: 0,
                    minLength: 2
                }
            });
    </script>
@endsection
