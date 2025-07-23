@extends('layouts.app')

@section('content')

        <x-headers.top-header pageTitle="Members">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newMemberModal">
                <i class="fi fi-br-plus me-3"></i>
                Create Member
            </button>
        </x-headers.top-header>

        @include('partials.errors')

        <div class="card border-0">
            <div class="card-body">
                <table class="table table-sm datatables">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Member ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Trade</th>
                            <th scope="col">Region</th>
                            <th scope="col">Status</th>
                            <th scope="col">Joined Date</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($members) && !$members->isEmpty())
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $member->member_id }}</td>
                                    <td>{{ $member->full_name }}</td>
                                    <td>{{ $member->email ?: 'N/A' }}</td>
                                    <td>{{ $member->trade?->trade_name ?: 'N/A' }}</td>
                                    <td>{{ $member->region?->region_name ?: 'N/A' }}</td>
                                    <td>{!! $member->status_badge !!}</td>
                                    <td>{{ $member->joined_date->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('member.show', $member) }}" class="text-decoration-none me-2">
                                            <i class="fi fi-br-eye me-1"></i> View</a>
                                        <a href="javascript:void(0)" class="edit me-2 text-primary text-decoration-none" data-url="{{ route('member.edit', $member) }}">
                                            <i class="fi fi-br-pencil me-0"></i> Edit</a>
                                        <form action="{{ route('member.delete', $member) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                        <a href="javascript:void(0)" class="text-danger delete" type="submit">
                                            <i class="fi fi-br-trash me-1"></i>Delete</a>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center py-4">
                                    <p class="mb-0">No members found.</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create Member Modal -->
        <div class="modal fade" id="newMemberModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Create New Member
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('member.store') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="Enter first name" value="{{ old('first_name') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="Enter last name" value="{{ old('last_name') }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter email address" value="{{ old('email') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Enter phone number" value="{{ old('phone') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                                            value="{{ old('date_of_birth') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" name="gender" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="cohort" class="form-label">Cohort</label>
                                        <input type="text" class="form-control" name="cohort" id="cohort"
                                            placeholder="e.g. 2024-A" value="{{ old('cohort') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="2"
                                    placeholder="Enter full address">{{ old('address') }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="region_id" class="form-label">Region</label>
                                        <select class="form-select" name="region_id" id="region_id">
                                            <option value="">Select Region</option>
                                            @foreach($regions as $key => $value)
                                                <option value="{{ $key }}" {{ old('region_id') == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="district_id" class="form-label">District</label>
                                        <select class="form-select" name="district_id" id="district_id">
                                            <option value="">Select District</option>
                                            @foreach($districts as $key => $value)
                                                <option value="{{ $key }}" {{ old('district_id') == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="trade_id" class="form-label">Trade</label>
                                        <select class="form-select" name="trade_id" id="trade_id">
                                            <option value="">Select Trade</option>
                                            @foreach($trades as $key => $value)
                                                <option value="{{ $key }}" {{ old('trade_id') == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="experience_years" class="form-label">Years of Experience</label>
                                        <input type="number" class="form-control" name="experience_years" id="experience_years"
                                            placeholder="Enter years of experience" value="{{ old('experience_years') }}" min="0" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="skill_level" class="form-label">Skill Level</label>
                                        <select class="form-select" name="skill_level" id="skill_level">
                                            <option value="">Select Skill Level</option>
                                            <option value="beginner" {{ old('skill_level') === 'beginner' ? 'selected' : '' }}>Beginner</option>
                                            <option value="intermediate" {{ old('skill_level') === 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                            <option value="advanced" {{ old('skill_level') === 'advanced' ? 'selected' : '' }}>Advanced</option>
                                            <option value="expert" {{ old('skill_level') === 'expert' ? 'selected' : '' }}>Expert</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="membership_type" class="form-label">Membership Type</label>
                                        <select class="form-select" name="membership_type" id="membership_type" required>
                                            <option value="">Select Type</option>
                                            <option value="individual" {{ old('membership_type') === 'individual' ? 'selected' : '' }}>Individual</option>
                                            <option value="corporate" {{ old('membership_type') === 'corporate' ? 'selected' : '' }}>Corporate</option>
                                            <option value="student" {{ old('membership_type') === 'student' ? 'selected' : '' }}>Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="membership_status" class="form-label">Membership Status</label>
                                        <select class="form-select" name="membership_status" id="membership_status" required>
                                            <option value="">Select Status</option>
                                            <option value="active" {{ old('membership_status') === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('membership_status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            <option value="suspended" {{ old('membership_status') === 'suspended' ? 'selected' : '' }}>Suspended</option>
                                            <option value="pending" {{ old('membership_status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="joined_date" class="form-label">Joined Date</label>
                                        <input type="date" class="form-control" name="joined_date" id="joined_date"
                                            value="{{ old('joined_date', date('Y-m-d')) }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label">Biography</label>
                                <textarea class="form-control" name="bio" id="bio" rows="3"
                                    placeholder="Enter member biography or description">{{ old('bio') }}</textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fi fi-br-check me-3"></i>
                                Create Member
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <div id="modal_holder"></div>

@endsection

@section('js')

<script type="text/javascript">
$(document).ready(function() {

    $(document).on('click', '.table tbody .edit', function(event){
        event.preventDefault();
        const url = $(this).data('url');

        $.get(url)
            .done(function(response) {
                $('#modal_holder').html(response)
                $('#editMemberModal').modal('show');
            })
            .fail(function() {
                bootbox.alert('Error loading edit form');
            });
    });

    $(document).on('click', '.table tbody .delete', function (event) {
        event.preventDefault()

        const $form = $(this).closest('form')

        bootbox.confirm("Are you sure you want to delete this member?", function (answer){
            if (answer) {
                $form.submit()
            }
        })
    })
});
</script>

@endsection
