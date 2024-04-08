<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="#" class="site_title"><i class="fa fa-paw"></i>
          @if(Auth::user()->role_as == '1')
          <span>System Admin!</span></a>
          @elseif(Auth::user()->role_as == '2')
          <span>HR!</span></a>
          @elseif(Auth::user()->role_as == '0')
          <span>User!</span></a>
          @endif
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('assets/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>{{ Auth::user()->name }}</h2>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        
        <div class="menu_section">
            <h3>Live On</h3>
            <ul class="nav side-menu">
                <li><a href="/admin/dashboard"><i class="fa fa-laptop"></i> Dashboard</a></li>
                @if(Auth::user()->role_as == '1')
                <li><a href="/admin/hrPage"><i class="fa fa-laptop"></i> Human Resources</a></li>
                @endif
                @if(Auth::user()->role_as == '2')
                <li><a href="/hr/hrPage"><i class="fa fa-laptop"></i> Human Resources</a></li>
                @endif
                @if(Auth::user()->role_as == '1')
                  <li><a href="/admin/users"><i class="fa fa-laptop"></i> Users Account </a></li>
                @endif
                @if(Auth::user()->role_as == '1')
                <li><a href="/admin/profile"><i class="fa fa-laptop"></i> Profile </a></li>
                @elseif(Auth::user()->role_as == '2')
                <li><a href="/hr/profile"><i class="fa fa-laptop"></i> Profile </a></li>
                @else
                <li><a href="/user/profile"><i class="fa fa-laptop"></i> Profile </a></li>
                @endif
                <li><a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-laptop"></i> Exit </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                              </li>
            </ul>
        </div>

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>