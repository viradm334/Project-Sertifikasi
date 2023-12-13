@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
</div>

@if (session()->has('success'))

    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    
@endif

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
      <form action="/users" method="GET">
          @if (request('name'))
              <input type="hidden" name="category" value="{{ request('name') }}">
          @endif
          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
              <button class="btn btn-dark" type="submit">Search</button>
          </div>
      </form>
  </div>
</div>

<div class="table-responsive small col-lg-10">
    <a href="/dashboard/users/create" class="btn btn-primary mb-3">Create new user</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Is Admin?</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
         @foreach($users as $user)   
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if($user->is_admin === 1)
            Yes
            @else
            No
            @endif
          </td>
          <td>
            <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning"><i class="bi bi-pen h6"></i></a>
            <form action="/dashboard/users/{{ $user->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle h6"></i></button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{ $users->links() }}
    
@endsection