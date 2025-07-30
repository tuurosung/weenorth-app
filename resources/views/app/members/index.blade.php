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

        @include('app.members.modals.create')

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
