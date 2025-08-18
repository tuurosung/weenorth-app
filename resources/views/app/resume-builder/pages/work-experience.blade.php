<div class="mb-5">


    <div class="d-flex justify-content-between">
        <div>
            <h5 class="fs-18px">Work Experience</h5>
        </div>
        <div>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addWorkExperienceModal">
                <i class="fi fi-rr-pencil"></i> Add Experience
            </a>

        </div>
    </div>

    <hr class="w-25 border-1 opacity-10 mt-2">

    @php
        $workExperiences = $currentUser->workExperiences;
    @endphp

    @foreach ($workExperiences as $experience)
    <section class="resume-section work-experience">

        <div class="d-flex justify-content-between">
            <div>
                <p class="work-period mb-2">{{ $experience->start_date }} - {{ $experience->end_date }} |
                    {{ $experience->duration }}
                </p>
                <h5 class="work-position mb-1">{{ $experience->job_title }}</h5>
            </div>
            <div>
                <div>
                    <a href="javascript:void(0)" class="text-decoration-none me-3 edit-work-experience"
                        data-url="{{ route('resume-builder.work-experience.edit', $experience) }}">
                        <i class="fi fi-rc-pencil"></i>
                    </a>
                    <form method="POST" action="{{  route('resume-builder.work-experience.delete', $experience) }}" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <a href="javascript:void(0)" class="text-decoration-none text-danger delete-work-experience"
                            data-url="{{ route('resume-builder.work-experience.delete', $experience) }}">
                            <i class="fi fi-rc-trash fs-16px"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>


        <p class="mb-1 text-muted">
            <span class="work-company">{{ $experience->company_name }}</span>
            <span class="work-state-country">{{ $experience->location }}</span>
        </p>
        <p>
            {!! $experience->work_description !!}
        </p>

    </section>
    @endforeach
</div>
