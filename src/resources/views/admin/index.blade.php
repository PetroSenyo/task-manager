@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Admin Panel</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
