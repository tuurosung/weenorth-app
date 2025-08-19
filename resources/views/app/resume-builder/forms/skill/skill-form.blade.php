<div class="form-group">
    <label for="skillName" class="form-label">Skill Description</label>
    <input type="text" class="form-control" name="skill_description" id="skill_description"
        placeholder="eg. Microsoft Excel" required>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="experience_level" class="form-label">Experience Level</label>
            <select class="form-select select2-input" name="experience_level" id="experience_level" required>
                <option value="">--- Select Option ---</option>
                @foreach (config('resume.experience') as $experience)
                <option value="{{ $experience }}">{{ $experience }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="years_of_experience" class="form-label">Years Of Experience</label>
            <select class="form-select select2-input" name="years_of_experience" id="years_of_experience" required>
                @foreach (config('resume.years_of_experience') as $yearsOfExperience)
                <option value="{{ $yearsOfExperience }}">{{ $yearsOfExperience }}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>
