@php
    $bio = $currentUser->bio;
@endphp

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="firstname" class="form-label">Firstname</label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="eg. Paulina"
                value="{{ $bio->firstname ?? '' }}" />
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="lastname" class="form-label">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="eg. Osei"
                value="{{ $bio->lastname ?? '' }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="" class="form-label">Date Of Birth</label>
            <input type="text" class="form-control datepicker" name="date_of_birth" id="date_of_birth" placeholder=""
                value="{{ $bio->date_of_birth ?? now()->subYears(20)->format('Y-m-d') }}" />
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="" class="form-label">Date Of Birth</label>
            <select class="form-select" name="gender" id="gender">
                <option value="">Select Gender</option>
                @foreach (config('resume.gender') as $key => $value)
                    <option value="{{ $key }}" {{ $key == 'female' ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="firstname" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="eg. user@example.com"
                value="{{ $bio->email ?? '' }}" />
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="lastname" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="eg. 024 123 4567"
                value="{{ $bio->phone ?? '' }}" />
        </div>
    </div>
</div>

<div class="form-group">
    <label for="" class="form-label">Residential Address</label>
    <input type="text" class="form-control" name="residential_address" id="residential_address"
        placeholder="eg. 47 Crescent Street, Koblimahgu, Tamale" value="{{ $bio->residential_address ?? '' }}" />
</div>


<div class="form-group">
    <label for="" class="form-label">Personal Statement</label>
    <textarea class="form-control" name="personal_statement" id="personal_statement" rows="4" style="min-height:80px">
    {{ $bio->personal_statement ?? '' }}
</textarea>
</div>
