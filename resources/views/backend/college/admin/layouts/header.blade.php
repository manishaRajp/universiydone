    

 <!-- right content -->
 <div id="content">
                 <!-- topbar -->
                 <div class="topbar">
                     <nav class="navbar navbar-expand-lg navbar-light">
                         <div class="full">
                             <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                             <div class="logo_section">
                                 <a href="{{ route('college.dasboard') }}"><img class="img-responsive" src="{{ asset("Admin/asset/images/logo/logo4.png") }}" alt="#" /></a>
                             </div>
                             <div class="right_topbar">
                                 <div class="icon_info">
                                     <ul>
                                         <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                         <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                         <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                     </ul>
                                     <ul class="user_profile_dd">
                                         <li>
                                             <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{ asset('/storage/CollegeLogo/'.Auth::guard('college')->user()->logo) }}" alt="#" /><span class="name_user">{{ Auth::user()->name }}</span></a>
                                             <div class="dropdown-menu">
                                                 <a class="dropdown-item" href="{{ route('college.profile_view') }}">My Profile</a>
                                                 <a class="dropdown-item" href="{{ route('college.view') }}">Change password</a>
                                                 <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                                <form id="logout-form" action="{{ route('college.logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                             </div>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </nav>
                 </div>
                 <!-- end topbar -->
