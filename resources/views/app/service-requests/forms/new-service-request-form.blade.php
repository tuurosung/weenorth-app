<div class="form-group">
    <label for="client_name">Client Name <span class="text-danger">*</span> </label>
    <input type="text" id="client_name" name="client_name" class="form-control h-9" required>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_email">Client's Email<span class="text-danger">*</span></label>
            <input type="email" id="client_email" name="client_email" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_phone">Client's Phone <span class="text-danger">*</span> </label>
            <input type="text" id="client_phone" name="client_phone" class="form-control" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="region_id">Region</label>
            <select id="region_id" name="region_id" class="form-select select2-input" required>
                <option value="">Select a region</option>
                @foreach ($regions as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="district_id">District</label>
            <select id="district_id" name="district_id" class="form-select select2-input" required>
                <option value="">Select a district</option>
            </select>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="service_center_id">Service Center</label>
            <select id="service_center_id" name="service_center_id" class="form-select select2-input" required>
                <option value="">Select a service center</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="trade_id">Trade</label>
            <select id="trade_id" name="trade_id" class="form-select select2-input" required>
                <option value="">Select a trade</option>
                @foreach ($trades as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="description">Description <span class="text-danger">*</span></label>
    <textarea id="service_description" name="description" class="form-control editor" rows="3"
        placeholder="Describe the service request..."></textarea>
</div>
