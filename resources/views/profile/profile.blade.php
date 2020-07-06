@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                  <form method="POST" action="{{ url('/addProfile') }}" enctype="multipart/form-data" >
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Name') }}</label>
                          <div class="col-md-6">
                              <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('Enter Designation') }}</label>

                          <div class="col-md-6">
                              <input id="designation" type="input" class="form-control @error('designation') is-invalid @enderror" name="designation" required autocomplete="designation">
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="profile_pic" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                          <div class="col-md-6">
                              <input id="profile_pic" type="file" class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic" required autocomplete="profile_pic">
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary btn-lg">
                                  {{ __('Add Profile') }}
                              </button>

                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
