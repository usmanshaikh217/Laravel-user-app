<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
      <nav>
        <!--<div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>-->

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="{{asset('assets/images/img.jpg')}}" alt="">John Doe
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Profile</a></li>
              <li>
                <a href="javascript:;">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Settings</span>
                </a>
              </li>
              <li><a href="javascript:;">Help</a></li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out pull-right"></i> {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
          
          <li role="role01">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Setting <span class=" fa fa-angle-down"></span></a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="#"> Types</a></li>
                <li><a href="/admin/state"> States</a></li>
              </ul>
            </li>
          <li role="role01">
              <a href="#"> Commission Tracker</a>
          </li>
          <li role="role01">
              <a href="/admin/referral"> Referrals</a>
          </li>
          <li role="role01">
              <a href="#"> Work Order</a>
          </li>
          <li role="role01">
            <a href="/admin/appointment"> Appointments</a>
        </li>
          <li role="role01">
              <a href="/admin/calendar"> Calendar</a>
          </li>
          <li role="role01">
              <a href="/admin/dashboard"> Dashboard</a>
          </li>
          
          
          
        </ul>
      </nav>
    </div>
  </div>
  <!-- /top navigation -->