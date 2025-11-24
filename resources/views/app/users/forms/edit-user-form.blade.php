<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="access_level" class="form-label">Access Level</label>
            <select class="form-select" name="access_level" id="access_level">
                <option >Select one</option>
                @foreach (config('user.access_levels') as $key => $value)
                    <option value="{{ $key }}" {{ $user->access_level === $key ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>


<div class="form-group">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
        placeholder="Alhassan Suweiba" value="{{ $user->name }}" />
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="someone@example.com"
                value="{{ $user->email }}" />
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="0241234567"
                value="{{ $user->phone_number }}" />
        </div>

    </div>
</div>
