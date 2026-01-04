@include('partials.head')

<style>
.resume-section-header {
    font-family: 'Marcellus', serif;
    font-weight: 600;
    font-size: 19px;
}

.resume-work-position,
.education-degree {
    font-family: 'Cal Sans', sans-serif;
    font-size: 14px;
}
</style>

<body>

    <div class="container-fluid py-5">

        <h3 class="marcellus mb-5">Curriculum Vitae</h3>


        <!--
        *
        * Bio Page
        *
    -->
        @php
        $bio = $currentUser->bio;
        $workExperiences = $currentUser->workExperiences;
        @endphp

        <div class="row">
            <div class="col-7">

                <div class="d-flex flex-column">
                    <p class="fs-40px fw-400 marcellus text-uppercase mb-0 mb-n3">{{ $bio->firstname ?? 'First Name' }}
                    </p>
                    <p class="fs-45px fw-400 marcellus text-uppercase fw-700 mb-0">{{ $bio->lastname ?? 'First Name' }}
                    </p>
                </div>

            </div>
            <div class="col-5 text-end border-end border-4 border-black">
                <div class="d-flex flex-column align-items-end">
                    <p class="mb-0">

                        <span>
                            <i class="fi fi-sr-phone-call me-2"></i>
                        </span>
                        <span>
                            {{ $bio->phone?? '' }}
                        </span>

                    </p>
                    <p class="mb-0">

                        <span>
                            <i class="fi fi-sr-envelope me-2"></i>
                        </span>
                        <span>
                            {{ $bio->email ?? '' }}
                        </span>

                    </p>
                    <p class="mb-0">

                        <span>
                            <i class="fi fi-sr-marker me-2"></i>
                        </span>
                        <span>
                            {{ $bio->residential_address ?? '' }}
                        </span>

                    </p>
                </div>
            </div>
        </div>

        <hr class="border-top border-2 opacity-100 border-dark">

        <!-- Personal Statement -->
        <section class="py-3 mb-3">
            <h5 class="resume-section-header">Personal Statement</h5>
            <div class="fs-12px text-justify">{{ $bio->personal_statement ?? '' }}</div>
        </section>


        <!-- Work Experience -->
        <section class="mb-5">
            <h5 class="resume-section-header mb-4">Work Experience</h5>

            @foreach ($workExperiences as $experience)

            <div class="mb-4">

                <div class="d-flex justify-content-between">
                    <div>
                        <p class="mb-2 fs-12px">{{ $experience->start_date }} - {{ $experience->end_date }} |
                            {{ $experience->duration }}
                        </p>
                        <h5 class="resume-work-position mb-1">{{ $experience->job_title }}</h5>
                    </div>
                </div>

                <div class="px-3">
                    <p class="mb-1 text-muted">
                        <span class="">{{ $experience->company_name }}</span>
                        <span class="work-state-country">{{ $experience->location }}</span>
                    </p>
                    <p class="px-3">
                        {!! $experience->work_description !!}
                    </p>
                </div>




            </div>
            @endforeach
        </section>


        <!-- Educational History -->
        <section class="mb-5">


            <div class="d-flex justify-content-between">
                <div>
                    <h5 class="resume-section-header">Education History</h5>
                </div>
                <div>

                </div>
            </div>

            <hr class="w-25 border-1 opacity-10 mt-2">

            @foreach ($currentUser->resumeEducation as $education)

            <div class="px-20px mb-3">

                <div class="d-flex justify-content-between">
                    <div class="">
                        <h5 class="education-degree">{{ $education->certificate_awarded }}</h5>
                        <p class="mb-1 text-muted">
                            <span class="education-institution">{{ $education->institution }}</span>
                            <span class="education-state-country">{{ $education->education_location }}</span>
                        </p>
                    </div>
                    <div class="">
                        <p class="education-duration mb-2">{{ $education->education_period }}</p>
                    </div>
                </div>


            </div>

            @endforeach


        </section>


        <section>
            @php
            $skills = Auth::user()->skills ?? [];
            @endphp

            <div class="mb-5">


                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="resume-section-header">Skills </h5>
                    </div>
                    <div>

                    </div>
                </div>

                <ol id="" class="list-group">
                    @foreach ($skills as $skill)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                {{ $loop->iteration }}.
                                <strong>{{ $skill->skill_description }}</strong>
                                <span
                                    class="badge {{ $skill->experience_text_colour }} {{ $skill->experience_bg_colour }}">{{ $skill->experience_level }}</span>
                            </div>
                            <div>
                                <span
                                    class="badge {{ $skill->experience_text_colour }} {{ $skill->experience_bg_colour }} me-4">{{ $skill->years_of_experience }}
                                    Years</span>

                            </div>
                        </div>
                    </li>
                    @endforeach
                </ol>



            </div>

        </section>


    </div>


</body>

<script>
    print();
</script>

</html>
