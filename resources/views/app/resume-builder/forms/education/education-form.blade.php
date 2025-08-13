<div class="mb-4 form-group">
    <label for="" class="form-label">
        Certificate Awarded
    </label>
    <input type="text" class="form-control" name="certificate_awarded" id="certificate_awarded"
        aria-describedby="helpId" placeholder="eg. Bsc Community Nutrition" />
</div>

<div class="row">
    <div class="col">

        <div class="form-group">
            <label for="institution" class="form-label">Name Of Institution</label>
            <input type="text" class="form-control" name="institution" id="institution"
                placeholder="eg. University For Development Studies" />
        </div>

    </div>
    <div class="col">
        <div class="form-group">
            <label for="certificate_type" class="form-label">Certificate Type</label>
            <select class="form-select" name="certificate_type" id="certificate_type">
                <option value="">Select Certificate Type</option>
                @foreach(config('resume.degrees') as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
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
                    <option value="{{ $region }}">{{ $region }}</option>
                @endforeach
            </select>
        </div>


    </div>
    <div class="col">
        <div class="form-group">
            <label for="" class="form-label">City</label>
            <select class="form-select select2-input" name="city" id="city">
                <option value="">Select one</option>
            </select>
        </div>

    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="start_date" max="{{ now()->format('Y-m-d') }}" pattern="\d{4}-\d{2}-\d{2}" />

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date" id="end_date" max="{{ now()->format('Y-m-d') }}" />
        </div>
    </div>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" value="currently_studying" id="currently_studying">
    <label class="form-check-label" for="currently_studying">
        I am currently studying this course
    </label>
</div>
