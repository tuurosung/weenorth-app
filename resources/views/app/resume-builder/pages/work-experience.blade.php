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

    <section class="resume-section work-experience">
        <p class="work-period mb-2">1999 - 2002</p>
        <h5 class="work-position mb-1">Software Engineer</h5>
        <p class="mb-1 text-muted">
            <span class="work-company">Some Graphics Inc.</span>
            <span class="work-state-country">Tamale, Ghana</span>
        </p>
        <p>
            Graduated with honors, specializing in software development and artificial intelligence.
            Relevant coursework included Data Structures, Algorithms, Database Systems, and Machine
            Learning.
            <br><br>
            <strong>Key Projects:</strong>
        <ul class="mt-2">
            <li>E-commerce Web Application - Built using PHP and MySQL with user authentication and
                payment integration</li>
            <li>Task Management System - Developed a full-stack application using Laravel and Vue.js
            </li>
            <li>AI Chatbot - Created an intelligent chatbot using Python and natural language processing
            </li>
            <li>Mobile Weather App - Designed and developed a responsive weather application using React
                Native</li>
        </ul>
        </p>
    </section>

    @php
$workExperiences = $currentUser->workExperiences;
    @endphp
@foreach ($workExperiences as $experience)
    <section class="resume-section work-experience">

            <p class="work-period mb-2">{{ $experience->start_date }} - {{ $experience->end_date }} | {{ $experience->duration }}</p>
            <h5 class="work-position mb-1">{{ $experience->job_title }}</h5>
            <p class="mb-1 text-muted">
                <span class="work-company">{{ $experience->company_name }}</span>
                <span class="work-state-country">{{ $experience->location }}</span>
            </p>
            <p>
                {{ $experience->description }}
            </p>

    </section>
@endforeach
</div>
