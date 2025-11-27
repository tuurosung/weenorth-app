@extends('layouts.app')

@section('content')

    <x-headers.top-header2 title="Trades">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newTradeModal">
            New Trade
        </button>
    </x-headers.top-header2>

    @include('partials.errors')

    <div class="card border-0">
        <div class="card-body">
            <table class="table table-sm datatables">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Trade Name</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-center">Tradeswomen</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($trades) && !$trades->isEmpty())
                        @foreach ($trades as $trade)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $trade->created_at->format('d M Y') }}</td>
                                <td>{{ Str::limit($trade->trade_name, 20) }}</td>
                                <td>{{ Str::limit($trade->description, 30) }}</td>
                                <td class="text-center">{{ $trade->tradeswomen_count }}</td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="triggerId"
                                            data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">

                                            <a href="{{ route('trade.show', $trade) }}" class="dropdown-item d-flex">
                                                View
                                                <i class="fi fi-br-eye me-1 ms-auto"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="edit dropdown-item d-flex"
                                                data-url="{{ route('trade.edit', $trade) }}">
                                                Edit
                                                <i class="fi fi-sr-pencil ms-auto text-primary"></i>
                                            </a>

                                            <form action="{{ route('trade.delete', $trade) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" class="delete dropdown-item d-flex" type="submit">
                                                    Delete
                                                    <i class="fi fi-sr-trash me-1 ms-auto text-danger"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
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

    @include('app.trades.modals.create')

    <div id="modal_holder"></div>

@endsection

@section('js')

    @vite(['resources/js/modules/trades/trades.js'])

@endsection
