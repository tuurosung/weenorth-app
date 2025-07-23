@extends('layouts.app')

@section('content')

    <x-headers.top-header pageTitle="Trades">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTradeModal">
            <i class="fi fi-br-plus me-3"></i>
            Create Trade
        </button>
    </x-headers.top-header>

    @include('partials.errors')

    <div class="card border-0">
        <div class="card-body">
            <table class="table table-sm datatables">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Trade Name</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($trades) && !$trades->isEmpty())
                        @foreach ($trades as $trade)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $trade->created_at->format('d M Y') }}</td>
                                <td>{{ $trade->trade_name }}</td>
                                <td>{{ Str::limit($trade->description, 50) }}</td>
                                <td class="text-end">
                                    <a href="{{ route('trade.show', $trade) }}" class="text-decoration-none me-2">
                                        <i class="fi fi-br-eye me-1"></i> View</a>

                                    <a href="javascript:void(0)" class="edit me-2 text-primary text-decoration-none"
                                        data-url="{{ route('trade.edit', $trade) }}">
                                        <i class="fi fi-br-pencil me-0"></i> Edit</a>

                                    <form action="{{ route('trade.delete', $trade) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" class="text-danger delete text-decoration-none" type="submit">
                                            <i class="fi fi-br-trash me-1"></i>Delete</a>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <p class="mb-0">No trades found.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Trade Modal -->
    <div class="modal fade" id="newTradeModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Create New Trade
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('trade.store') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="trade_name" class="form-label">Trade Name</label>
                            <input type="text" class="form-control" name="trade_name" id="trade_name"
                                placeholder="e.g. Carpentry" value="{{ old('trade_name') }}" required />
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4"
                                placeholder="Enter a detailed description of the trade"
                                required>{{ old('description') }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fi fi-br-check me-3"></i>
                            Create Trade
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
        $(document).ready(function () {

            $(document).on('click', '.table tbody .edit', function (event) {
                event.preventDefault();
                const url = $(this).data('url');

                $.get(url)
                    .done(function (response) {
                        $('#modal_holder').html(response)
                        $('#editTradeModal').modal('show');
                    })
                    .fail(function () {
                        bootbox.alert('Error loading edit form');
                    });
            });

            $(document).on('click', '.table tbody .delete', function (event) {
                event.preventDefault()

                const $form = $(this).closest('form')

                bootbox.confirm("Are you sure you want to delete this trade?", function (answer) {
                    if (answer) {
                        $form.submit()
                    }
                })
            })
        });
    </script>

@endsection
