@extends('layouts.app')

@section('content')

    <x-headers.top-header pageTitle="Trade Details">
        <a href="{{ route('trade.index') }}" class="btn btn-secondary">
            <i class="fi fi-br-arrow-left me-3"></i>
            Back to Trades
        </a>
    </x-headers.top-header>

    <div class="card border-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-3">{{ $trade->trade_name }}</h3>

                    <div class="mb-4">
                        <h5>Description</h5>
                        <p>{{ $trade->description }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Created:</strong> {{ $trade->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Updated:</strong> {{ $trade->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('trade.edit', $trade) }}" class="btn btn-primary me-2">
                            <i class="fi fi-br-pencil me-2"></i>
                            Edit Trade
                        </a>

                        <form action="{{ route('trade.delete', $trade) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this trade?')">
                                <i class="fi fi-br-trash me-2"></i>
                                Delete Trade
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
