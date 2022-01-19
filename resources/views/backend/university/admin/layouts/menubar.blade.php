<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="{{ route('university.dasboard') }}"><img class="logo_icon img-responsive" src=" {{ asset('Admin/asset/images/logo/images1.png') }}" alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img"><img class="img-responsive" src="{{ asset('Admin/asset/images/layout_img/user_img.jpg') }}" alt="#" /></div>
                <div class="user_info">
                    <h6>{{ Auth::guard('university')->user()->name }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>General</h4>
        <ul class="list-unstyled components">
            <li class="active">
                        <a href="{{ route('university.college.index') }}"><i class="fa fa-university orange_color"></i><span>Create College</span></a>
            </li>
            <li class="active">
                <a href="{{ route('university.subject.index') }}"><i class="fa fa-folder-open-o orange_color"></i>
                    <span>Subject</span></a>
            </li>
            <li class="active">
                <a href="{{ route('university.course.index') }}"><i class="fa fa-archive orange_color"></i> <span>
                        Course
                    </span></a>
            </li>
            <li class="active">
                <a href="{{ route('university.merti.index') }}"><i class="fa fa-archive orange_color"></i> <span>
                        Merit
                    </span></a>
            </li>
            <li class="active">
                <a href="{{ route('university.comman-setting.index') }}"><i class="fa fa-gear orange_color"></i>
                    <span>Comman setting</span></a>
            </li>
            <li class="active">
                <a href="{{ route('university.confirm-addmission.index')}}"><i class="fa fa-gear orange_color"></i>
                    <span>Addmision Confrim List</span></a>
            </li>
        </ul>
    </div>
</nav>