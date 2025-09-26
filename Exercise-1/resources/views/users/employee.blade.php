@extends('layouts.app')

@section('content')
<main class="main-content mt-5">
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Personal Information</h5>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Name</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Email</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Username</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Role</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Phone</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Address</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Date of Birth</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Public URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->dob }}</td>
                                        <td>
                                            @if($user->public_uri)
                                                <a href="{{ url($user->public_uri) }}" target="_blank" class="text-primary">
                                                    {{ $user->public_uri }}
                                                </a>
                                            @else
                                                <span class="text-muted">Private</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
