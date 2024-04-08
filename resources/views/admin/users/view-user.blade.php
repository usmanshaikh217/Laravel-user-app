@extends('layouts.master')

@section('title', 'Users - Multiuser App')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Profile</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>User Report <small>Activity report</small></h2>

              <div class="clearfix"></div>
            </div>
            @foreach($users as $user)
            <div class="x_content">
              <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="{{asset('assets/images/picture.jpg')}}" alt="Avatar" title="Change the avatar">
                  </div>
                </div>
                
                <h3>{{ $user->name }}</h3>
                

                <ul class="list-unstyled user_data">
                  <li><i class="fa fa-map-marker user-profile-icon"></i> Lusail, Qatar
                  </li>

                  <li>
                    <i class="fa fa-briefcase user-profile-icon"></i> {{$user->position}}
                  </li>

                  <li class="m-top-xs">
                    <i class="fa fa-external-link user-profile-icon"></i>
                    <a href="http://www.google.com/" target="_blank">www.google.com</a>
                  </li>
                </ul>

                <br>

                
              

              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">

              </div>

              @endforeach

@endsection