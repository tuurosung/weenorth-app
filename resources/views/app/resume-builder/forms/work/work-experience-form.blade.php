<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="" class="form-label">Employment Type</label>
            <select name="employment_type" id="employment_type" class="form-select">
                <option value="">-- Select Employment Type --</option>
                @foreach (config('resume.employment_types') as $type)
                <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <!-- Position -->
        <div class="form-group">
            <label for="" class="form-label">Position</label>
            <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Enter Position">
        </div>
    </div>
    <div class="col-md-6">
        <!-- Company -->
        <div class="form-group">
            <label for="" class="form-label">Company</label>
            <input type="text" class="form-control" name="company_name" id="company_name"
                placeholder="Enter Company Name" />
        </div>

    </div>
</div>


<!-- From and To -->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" id="location" placeholder="Enter Location" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label">From</label>
                    <input type="date" class="form-control" name="start_date" id="start_date"
                        placeholder="Enter Start Date" max="{{ now()->format('Y-m-d') }}" />

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label">To</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Enter End Date"
                        max="{{ now()->format('Y-m-d') }}" />

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="0" id="still_working_here" name="" />
                        <label class="form-check-label" for="still_working"> I still work here </label>
                        <input type="hidden" name="still_working_here" value="0" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Description -->
<div class="form-group">
    <label for="" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="work_description" rows="3" placeholder="Enter Job Description"
        style="min-height: 100px;"></textarea>
</div>
