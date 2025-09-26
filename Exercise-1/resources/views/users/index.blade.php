@extends('layouts.app')

@section('content')
<main class="main-content mt-5">
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-uppercase">Employee List</h4>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-white bg-gradient-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Add New Employee</a>
        </div>

        <div class="card shadow-lg">
            <div class="card-header pb-0">
                <h6>Employees</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Email</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Username</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Role</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Phone</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Address</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">DOB</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Public URI</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    <span class="badge badge-sm bg-gradient-info">{{ ucfirst($user->role) }}</span>
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->dob }}</td>

                                {{-- ✅ Public URI column --}}
                                <td>
                                    @if($user->public_uri)
                                        <a href="{{ url($user->public_uri) }}" 
                                           target="_blank" 
                                           class="text-info text-gradient">
                                           {{ url($user->public_uri) }}
                                        </a>
                                    @else
                                        <span class="text-muted">Not set</span>
                                    @endif
                                </td>

                                {{-- ✅ is_public status --}}
                                <td>
                                    @if($user->is_public)
                                        <span class="badge bg-success">Public</span>
                                    @else
                                        <span class="badge bg-secondary">Private</span>
                                    @endif
                                </td>

                                {{-- ✅ Action buttons --}}
                                <td class="d-flex gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
