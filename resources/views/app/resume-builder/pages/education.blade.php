<div class="mb-5">


    <div class="d-flex justify-content-between">
        <div>
            <h5 class="fs-18px">Education History</h5>
        </div>
        <div>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addEducationModal">
                <i class="fi fi-rr-pencil"></i> Add Education
            </a>

        </div>
    </div>

    <hr class="w-25 border-1 opacity-10 mt-2">

    @foreach ($currentUser->resumeEducation as $education)

        <section class="resume-section">

            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="education-duration mb-2">{{ $education->education_period }}</p>
                    <h5 class="education-degree">{{ $education->certificate_awarded }}</h5>

                    <p class="mb-1 text-muted">
                        <span class="education-institution">{{ $education->institution }}</span>
                        <span class="education-state-country">{{ $education->education_location }}</span>
                    </p>
                </div>
                <div class="d-flex flex-column">
                    <a href="javascript:void(0)" class="edit-education text-decoration-none text-secondary fs-18px mb-3"
                        data-url="{{ route('resume-builder.education.edit', $education) }}">
                        <i class="fi fi-rr-pencil"></i>
                    </a>
                    <form method="POST" action="{{ route('resume-builder.education.delete', $education) }}">
                        @csrf
                        @method('DELETE')
                        <a href="javascript:void(0)" class="delete-education text-decoration-none text-secondary fs-18px"
                            data-bs-target="#editEducationModal{{ $education->id }}">
                            <i class="fi fi-rr-trash-check"></i>
                        </a>
                    </form>
                </div>
            </div>

        </section>

    @endforeach


</div>
