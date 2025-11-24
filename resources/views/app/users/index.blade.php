@extends('layouts.app')


@section('content')

    <x-headers.top-header pageTitle="Users">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newUserModal">
            <i class="fa fa-plus me-3"></i>
            Add User
        </button>
    </x-headers.top-header>

    @include('partials.errors')

    <div class="card border-0">
        <div class="card-body">

            <table class="table datatables">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Phone NUmber</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Access Level</th>
                        <th scope="col" class="text-end">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->access_level_description }}</td>
                        <td class="text-end">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-dark" type="button" id="triggerId"
                                    data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </a>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <a class="dropdown-item d-flex edit-user-button" href="#" data-edit-url="{{ route('users.edit', $user->id) }}">
                                        Edit
                                        <i class="fi fi-rc-pencil ms-auto text-primary"></i>
                                    </a>
                                    <form method="POST" action="{{ route('users.delete', $user) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="dropdown-item d-flex delete-user-button" href="#">
                                            Delete
                                            <i class="fi fi-rc-trash ms-auto text-danger"></i>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div id="modal_holder"></div>

    @include('app.users.modals.new-user-modal')


@endsection

@push('scripts')
    @vite(['resources/js/modules/users/users.js'])
@endpush

@section('js')

    <script>

    //    $(document).on('click', '.table tbody .edit-user', function(event){

    //         let $url = $(this).data('url');

    //         $.get($url, function(msg){
    //             $('#modal_holder').html(msg);
    //             $('#editUserModal').modal('show');
    //         })

    //    })

    </script>

@endsection
