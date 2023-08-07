@extends('layout.default')


@section('title')
    Register
@endsection


@section('content')
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <h1>Login</h1>

        <div class="mb-3">
            <label class="form-label">email</label>
            <input class="form-control" type="text" name="email" placeholder="Enter email" required />
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input class="form-control" type="text" name="password" placeholder="Enter name" required />
        </div>
       
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    @include('components.errors')
    @include('components.status')
@endsection