<div class="mb-4 form-group">
    <label for="" class="form-label">
        Certificate Awarded
    </label>
    <input type="text" class="form-control" name="certificate_awarded" id="certificate_awarded"
        aria-describedby="helpId" placeholder="eg. Bsc Community Nutrition"
        value="{{ $education->certificate_awarded }}" />
</div>

<div class="row">
    <div class="col">

        <div class="form-group">
            <label for="institution" class="form-label">Name Of Institution</label>
            <input type="text" class="form-control" name="institution" id="institution"
                placeholder="eg. University For Development Studies" value="{{ $education->institution }}" />
        </div>

    </div>
    <div class="col">
        <div class="form-group">
            <label for="certificate_type" class="form-label">Certificate Type</label>
            <select class="form-select" name="certificate_type" id="certificate_type">
                <option value="">Select Certificate Type</option>
                @foreach(config('resume.degrees') as $type)
                    <option value="{{ $type }}" {{ $education->certificate_type === $type ? 'selected' : '' }}>{{ $type }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="" class="form-label">Region</label>
            <select class="form-select select2-input" name="region" id="region">
                <option value="">Select one</option>
                @foreach($regions as $region)
                    <option value="{{ $region }}" {{ $education->region === $region ? 'selected' : '' }}>{{ $region }}
                    </option>
                @endforeach
            </select>
        </div>


    </div>
    <div class="col">
        <div class="form-group">
            <label for="" class="form-label">City</label>
            <select class="form-select select2-input" name="city" id="city">
                <option value="">Select one</option>
                @foreach ($cities as $city)
                    <option value="{{ $city }}" {{ $education->city === $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="start_date" max="{{ now()->format('Y-m-d') }}"
                value="{{ $education->start_date }}" />

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date" id="end_date" max="{{ now()->format('Y-m-d') }}"
                value="{{ $education->end_date }}" />
        </div>
    </div>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" value="currently_studying" id="currently_studying">
    <label class="form-check-label" for="currently_studying">
        I am currently studying this course
    </label>
</div>
