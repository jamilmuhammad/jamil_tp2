@extends('layouts.app')

@push('style')

@endpush

@section('title_page')
    <h1 class="h4 mb-0 text-primary">
        <strong>Dashboard</strong>
    </h1>
    <div class="d-flex justify-content-end">
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="fas fa-redo mr-2"></i> Refresh</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="card border-left-danger shadow h-100 mb-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <h3 class="h6 mb-0 text-primary"><strong>Welcome, {{ Auth::user()->name ?? '' }}</strong></h3>
                    <p>This is my Muhammad Jamil (2502098815) Personal Assignment 2</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush