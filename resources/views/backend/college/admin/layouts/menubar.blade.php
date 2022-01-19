<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="{{ route('college.dasboard') }}"><img class="logo_icon img-responsive"
                        src=" {{ asset('Admin/asset/images/logo/images1.png') }}" alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img"><img class="img-responsive"
                        src="{{ asset('/storage/CollegeLogo/' . Auth::guard('college')->user()->logo) }}" alt="#" />
                </div>
                <div class="user_info">
                    <h6>{{ Auth::guard('college')->user()->name }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>General</h4>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('college.course.index') }}"><i class="fa fa-archive orange_color"></i> <span>
                        Course
                    </span></a>
            </li>
        </ul>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('college.merit.index') }}"><i class="fa fa-archive orange_color"></i> <span>
                        Merit
                    </span></a>
            </li>
        </ul>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('college.college-confirm-addmission.index') }}"><i class="fa fa-archive orange_color"></i> <span>
                       Addmisson MeritBse
                    </span></a>
            </li>
        </ul>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('college.college-confirm-addmission.create') }}"><i class="fa fa-archive orange_color"></i> <span>
                       Addmisson Reservedbased
                    </span></a>
            </li>
        </ul>
    </div>
</nav>
