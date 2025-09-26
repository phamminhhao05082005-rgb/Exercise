@extends('layouts.app')

@section('title', 'Employee Profile')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>👤 Employee Profile</h6>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Personal Information</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input class="form-control" type="text" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input class="form-control" type="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="form-control-label">Role</label>
                                <input class="form-control" type="text" value="{{ $user->role }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="form-control-label">Phone</label>
                                <input class="form-control" type="text" value="{{ $user->phone }}" readonly>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-4">This page is public – anyone with the link can view.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-profile">
                <img src="{{ $user->avatar ?? asset('argon/img/team-1.jpg') }}" alt="Profile Image" class="card-img-top">
                <div class="card-body text-center">
                    <h5>{{ $user->name }}</h5>
                    <p class="text-sm text-muted">{{ $user->role }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->phone }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
