@extends('layouts.app')

@section('content')
    <x-headers.top-header pageTitle="My Resume" />

    @include('partials.errors')

    <!-- tab v2 with card -->
    <div class="card mb-5 border-0 col-md-9">
        <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
            <li class="nav-item me-3">
                <a href="#preview" class="nav-link active" data-bs-toggle="tab">
                    <i class="fi fi-rr-resume me-2"></i>
                    Resume Preview
                </a>
            </li>
            <li class="nav-item me-3">
                <a href="#personalInformation" class="nav-link" data-bs-toggle="tab">
                    <i class="fi fi-rr-user me-2"></i>
                    Personal Information
                </a>
            </li>
            <li class="nav-item me-3">
                <a href="#workExperience" class="nav-link" data-bs-toggle="tab">
                    <i class="fi fi-rr-user me-2"></i>
                    Work Experience
                </a>
            </li>
            <li class="nav-item me-3">
                <a href="#education" class="nav-link" data-bs-toggle="tab">
                    <i class="fi fi-rr-envelope me-2"></i>
                    Education
                </a>
            </li>
            <li class="nav-item me-3">
                <a href="#skills" class="nav-link" data-bs-toggle="tab">
                    <i class="fi fi-rr-tools me-2"></i>
                    Skills
                </a>
            </li>
            <li class="nav-item me-3">
                <a href="#projects" class="nav-link" data-bs-toggle="tab">
                    <i class="fi fi-rr-briefcase me-2"></i>
                    Projects
                </a>
            </li>
            <li class="nav-item me-3">
                <a href="#achievements" class="nav-link" data-bs-toggle="tab">
                    <i class="fi fi-rr-award me-2"></i>
                    Achievements
                </a>
            </li>
            <li class="nav-item me-3">
                <a href="#languages" class="nav-link" data-bs-toggle="tab">
                    <i class="fi fi-rr-language me-2"></i>
                    Languages
                </a>
            </li>
        </ul>
        <div class="tab-content p-4">
            <div class="tab-pane fade show active" id="preview">

                @include('app.resume-builder.pages.bio')

                @include('app.resume-builder.pages.work-experience')

                @include('app.resume-builder.pages.education')

                @include('app.resume-builder.pages.skills')

            </div>
            <div class="tab-pane fade" id="personalInformation">

                <div class="d-flex justify-content-between mb-5">
                    <div>
                        <h4>Personal Information</h4>
                    </div>
                    <div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPersonalInfoModal">
                            <i class="fi fi-rr-plus me-2"></i> Add Personal Info
                        </button>
                    </div>
                </div>




                @include('app.resume-builder.forms.bio.bio-form')


            </div>
            <div class="tab-pane fade" id="education">

                <div class="d-flex justify-content-between">
                    <h4>Education History</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEducationModal">
                        <i class="fi fi-rr-plus me-2"></i> Add Education
                    </button>
                </div>

                @include('partials.errors')


            </div>
        </div>
    </div>


    @include('app.resume-builder.modals.education.education')
    @include('app.resume-builder.modals.work.work-experience-modal')
    @include('app.resume-builder.modals.skill.new-skill-modal')
    @include('app.resume-builder.modals.bio.bio-modal')

    <div id="modal_holder"></div>
@endsection



@section('js')
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
