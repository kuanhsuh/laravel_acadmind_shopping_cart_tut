@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h1>Sign In</h1>
    <form action="{{route('user.signin')}}" method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Sign In</button>
      {{ csrf_field() }}
    </form>
    <p>Don't have an account? <a href="{{ route('user.signup')}}">Sign up here</a></p>
  </div>
</div>

@endsection