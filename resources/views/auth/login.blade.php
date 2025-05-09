@extends('layouts.plantilla')
@section('body-class','bg-body-secondary')
@section('contenido')
    <div class="login-box my-5 mx-auto">
      <div class="login-logo">
        <a href="../index2.html"><b>Admin</b>LTE</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <form action="{{route('login')}}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email"/>
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
           
            <div class="row">
              
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
          <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p>
          <p class="mb-0">
            <a href="{{route('register')}}" class="text-center"> Register a new membership </a>
          </p>
        </div>
      </div>
    </div>
@endsection
