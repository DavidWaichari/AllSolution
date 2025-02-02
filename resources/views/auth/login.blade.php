@extends('layouts/auth')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/admin-lte/index2.html" class="h1"><b>Cloud</b>Wage</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
  
        <form action="{{ route('login.store') }}" method="post">
          @csrf <!-- CSRF token -->
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
              <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
              <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->
  
        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="/register" class="text-center">Register a new membership</a>
        </p>
      </div>
    <!-- /.form-box -->
  </div><!-- /.card -->    
@endsection
