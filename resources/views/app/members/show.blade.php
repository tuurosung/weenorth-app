@extends('layouts.app')

@section('content')

    <x-headers.top-header pageTitle="Member Details">
        <a href="{{ route('member.index') }}" class="btn btn-secondary">
            <i class="fi fi-br-arrow-left me-3"></i>
            Back to Members
        </a>
    </x-headers.top-header>

    <div class="card border-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex align-items-center mb-4">
                        <h3 class="mb-0 me-3">{{ $member->full_name }}</h3>
                        {!! $member->status_badge !!}
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong>Member ID:</strong> {{ $member->member_id }}</p>
                            <p><strong>Email:</strong> {{ $member->email ?: 'N/A' }}</p>
                            <p><strong>Phone:</strong> {{ $member->phone ?: 'N/A' }}</p>
                            <p><strong>Date of Birth:</strong> {{ $member->date_of_birth ? $member->date_of_birth->format('d M Y') : 'N/A' }}</p>
                            <p><strong>Gender:</strong> {{ ucfirst($member->gender) ?: 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Cohort:</strong> {{ $member->cohort ?: 'N/A' }}</p>
                            <p><strong>Region:</strong> {{ $member->region?->name ?: 'N/A' }}</p>
                            <p><strong>District:</strong> {{ $member->district?->name ?: 'N/A' }}</p>
                            <p><strong>Joined Date:</strong> {{ $member->joined_date->format('d M Y') }}</p>
                            <p><strong>Membership Type:</strong> {{ ucfirst($member->membership_type) }}</p>
                        </div>
                    </div>

                    @if($member->address)
                        <div class="mb-4">
                            <h5>Address</h5>
                            <p>{{ $member->address }}</p>
                        </div>
                    @endif

                    @if($member->trade || $member->experience_years || $member->skill_level)
                        <div class="mb-4">
                            <h5>Professional Information</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Trade:</strong> {{ $member->trade?->trade_name ?: 'N/A' }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Experience:</strong> {{ $member->experience_years ? $member->experience_years . ' years' : 'N/A' }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Skill Level:</strong> {{ ucfirst($member->skill_level) ?: 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($member->bio)
                        <div class="mb-4">
                            <h5>Biography</h5>
                            <p>{{ $member->bio }}</p>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Created:</strong> {{ $member->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Updated:</strong> {{ $member->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="javascript:void(0)" class="btn btn-primary me-2 edit" data-url="{{ route('member.edit', $member) }}">
                            <i class="fi fi-br-pencil me-2"></i>
                            Edit Member
                        </a>

                        <form action="{{ route('member.delete', $member) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">
                                <i class="fi fi-br-trash me-2"></i>
                                Delete Member
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    @if($member->profile_photo)
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $member->profile_photo) }}" alt="{{ $member->full_name }}" 
                                 class="img-fluid rounded-circle mb-3" style="max-width: 200px; max-height: 200px;">
                        </div>
                    @else
                        <div class="text-center">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mb-3" 
                                 style="width: 200px; height: 200px; margin: 0 auto;">
                                <i class="fi fi-br-user" style="font-size: 3rem; color: #6c757d;"></i>
                            </div>
                        </div>
                    @endif

                    @if($member->is_verified)
                        <div class="alert alert-success text-center">
                            <i class="fi fi-br-check me-2"></i>
                            Verified Member
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            <i class="fi fi-br-exclamation me-2"></i>
                            Unverified Member
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="modal_holder"></div>

@endsection

@section('js')

<script type="text/javascript">
$(document).ready(function() {

    $(document).on('click', '.edit', function(event){
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

});
</script>

@endsection
