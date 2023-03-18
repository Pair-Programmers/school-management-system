<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        @if (is_null(Auth::user()->profile_image))
                        <img alt="image" class="img-circle" src="{{asset('assets')}}/img/default_profile_image.png" style="width: 70px; height: 70px"/>
                        @else
                        <img alt="image" class="img-circle" src="{{asset('storage')}}/images/{{Auth::user()->profile_image}}" style="width: 70px; height: 70px"/>
                        @endif
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs">
                                <strong class="font-bold">{{Auth::user()->name}}</strong>
                            </span> <span class="text-muted text-xs block">{{ucwords(Auth::user()->role)}} <b
                                    class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{route('profiles.edit', Auth::user())}}">My Profile</a></li>
                        {{-- <li><a href="contacts.html">Contacts</a></li> --}}
                        <li><a href="mailbox.html">Setingg</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-label">Dashboard</span>
                    {{-- <span class="fa arrow"></span> --}}
                    {{-- <span class="pull-right label label-primary">SPECIAL</span> --}}

                </a>

            </li>



            {{-- <li class="@if (request()->is('users/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('users.index')}}">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">Users</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('users.create')}}">Create New</a></li>
                    <li><a href="{{route('users.index')}}">List / Report</a></li>
                </ul>
            </li> --}}

            <li class="@if (request()->is('students/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('students.index')}}">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">Students</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('students.create')}}">Create New</a></li>
                    <li><a href="{{route('students.index')}}">List / Report</a></li>
                    <li><a href="{{route('students.index')}}">Student Registeration</a></li>
                </ul>
            </li>

            {{-- <li class="@if (request()->is('sections/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('sections.index')}}">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="nav-label">Sections</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('sections.create')}}">Create New</a></li>
                    <li><a href="{{route('sections.index')}}">List / Report</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('classes/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('classes.index')}}">
                    <i class="fa fa-slideshare"></i>
                    <span class="nav-label">Classes</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('classes.create')}}">Create New</a></li>
                    <li><a href="{{route('classes.index')}}">List / Report</a></li>
                </ul>
            </li> --}}

            {{-- <li class="@if (request()->is('teachers/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('teachers.index')}}">
                    <i class="fa fa-male"></i>
                    <span class="nav-label">Teachers</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('teachers.create')}}">Create New</a></li>
                    <li><a href="{{route('teachers.index')}}">List / Report</a></li>
                </ul>
            </li> --}}

            <li class="@if (request()->is('teachers/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('teachers.index')}}">
                    <i class="fa fa-money"></i>
                    <span class="nav-label">Fees Management</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Collect/Recieve</a></li>
                    <li><a href="{{route('vouchers.index')}}">Voucher List</a></li>
                </ul>
            </li>

            {{-- <li class="@if (request()->is('academic-years/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('academic-years.index')}}">
                    <i class="fa fa-calendar"></i>
                    <span class="nav-label">Academic Years</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('academic-years.create')}}">Create New</a></li>
                    <li><a href="{{route('academic-years.index')}}">List / Report</a></li>
                </ul>
            </li> --}}

            {{-- <li class="@if (request()->is('academic-years/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('academic-years.index')}}">
                    <i class="fa fa-clock-o"></i>
                    <span class="nav-label">Attendance</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('academic-years.create')}}">Student</a></li>
                    <li><a href="{{route('academic-years.index')}}">Teacher</a></li>
                    <li><a href="{{route('academic-years.index')}}">Employee</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('academic-years/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('academic-years.index')}}">
                    <i class="fa fa-sellsy"></i>
                    <span class="nav-label">Finance</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('academic-years.create')}}">Collect Fee</a></li>
                    <li><a href="{{route('vouchers.create')}}">Generate Voucher</a></li>
                    <li><a href="{{route('academic-years.index')}}">Report/List</a></li>
                    <li><a href="{{route('expenses.index')}}">Expenses</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('schools.edit', 1)}}"><i class="fa fa-gear"></i> <span class="nav-label">System Setting</span></a>
            </li> --}}

        </ul>

    </div>
</nav>
