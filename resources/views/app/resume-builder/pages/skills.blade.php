@php
$skills = Auth::user()->skills ?? [];
@endphp

<div class="mb-5">


    <div class="d-flex justify-content-between">
        <div>
            <h5 class="fs-18px">Skills </h5>
        </div>
        <div>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#newSkillModal">
                <i class="fi fi-rr-pencil"></i> Add Skills
            </a>

        </div>
    </div>

    <hr class="w-25 border-1 opacity-10 mt-2">
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
                    <a class="text-decoration-none fs-18px">
                        <i class="fi fi-rc-pencil"></i>
                    </a>
                    <form method="POST" action="{{ route('resume-builder.skills.delete', $skill) }}" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <a href="javascript:void(0)" class="text-decoration-none text-danger fs-18px delete-skill">
                            <i class="fi fi-rc-trash-check"></i>
                        </a>
                    </form>
                </div>
            </div>
        </li>
        @endforeach
    </ol>



</div>
