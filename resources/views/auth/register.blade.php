@extends('layouts.site')
@section('content')
    <div class="form-signin">
        <form action="{{ route('register') }}" method="post">
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection