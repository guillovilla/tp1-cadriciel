@extends('layouts.app')
@section('title', 'Login')
@section('content')
    @if(!$errors->isEmpty())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>     
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>                
    @endif
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">@lang('lang.se_connecter')</h5>
            <form  method="POST">
            @csrf
              <div class="form-floating mb-3">
              <div class="mb-3">
              <label for="username" class="form-label">@lang('Email')</label>
            <input type="text" class="form-control" id="username" name="email"  value="{{old('email')}}">
            </div>
              <div class="form-floating mb-3">
              <div class="mb-3">
                    <label for="password" class="form-label">@lang('Mot de passe')</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
              <div class="d-grid">
              <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
