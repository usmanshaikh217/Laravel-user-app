@extends('layouts.master')

@section('title', 'Add New User')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Add New User</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form action="{{ route('user.store') }}" method="POST" id="" data-parsley-validate="" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="" name="name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="" name="email"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="" name="position"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Photo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="" name="photo"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <p>

                            <label for="heard">Role *:</label>
                            <select id="heard" name="role_as" class="form-control" required="">
                              <option value="">Choose..</option>
                              <option value="1">Admin</option>
                              <option value="2">HR</option>
                              <option value="0">User</option>
                            </select>
  
                      </p>
                        
                        {{-- <div class="form-group">
                            <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                <label class="control-label"> Active </label>
                                <input type="checkbox" class="" name="status" checked value="1">
                            </div>
                        </div> --}}
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Save User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection