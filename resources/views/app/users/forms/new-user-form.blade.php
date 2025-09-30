<div class="form-group">
    <label for="" class="form-label">Full Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
        placeholder="eg. Alhassan Suweiba" />
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                placeholder="eg. alhassan@example.com" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" aria-describedby="helpId"
                placeholder="eg. 0241234567" />
        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="region_id" class="form-label">Region</label>
            <select
                class="form-select"
                name="region_id"
                id="region_id"
            >
                <option selected>Select one</option>
                <option value="">New Delhi</option>
                <option value="">Istanbul</option>
                <option value="">Jakarta</option>
            </select>
        </div>

    </div>
    <div class="col-md-6"></div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="access_level" class="form-label">Access Level</label>
            <select class="form-select select2-input" name="access_level" id="access_level">
                <option value="">Select one</option>

                @foreach (config('user.access_levels') as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach

            </select>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="district_id" class="form-label">District</label>
            <select class="form-select select2-input" name="district_id" id="district_id">
                <option value="">Select one</option>

                @foreach ($districts as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>


<h6>NB:</h6>
<p class="fs-12px">
    The default password for new users is their <strong>Phone Number</strong>. Please ensure that the user changes their
    password upon first login for security reasons.
</p>
