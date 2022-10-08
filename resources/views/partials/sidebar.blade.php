<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{asset('storage')}}/images/admins/" style="width: 70px; height: 70px"/>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs">
                                <strong class="font-bold">{{Auth::user()->name}}</strong>
                            </span> <span class="text-muted text-xs block">{{Auth::user()->name}} <b
                                    class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{route('users.edit', Auth::user())}}">My Profile</a></li>
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
                <a href="">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                    {{-- <span class="fa arrow"></span> --}}
                    {{-- <span class="pull-right label label-primary">SPECIAL</span> --}}

                </a>

            </li>
            <li class="@if (request()->is('admin/product*'))  {{'active'}} @else {{''}} @endif">
                <a href="">
                    <i class=" fa fa-cube"></i>
                    <span class="nav-label">Products</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="">Manage Products</a></li>
                    <li><a href="">Categories</a></li>
                    <li><a href="">Sub Categories</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('admin/order*'))  {{'active'}} @else {{''}} @endif">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span class="nav-label">Orders</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="">List</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('admin/user*'))  {{'active'}} @else {{''}} @endif">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">Web Users</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="">Manage Users</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('users/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('users.index')}}">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">Users</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('users.create')}}">Create New</a></li>
                    <li><a href="{{route('users.index')}}">List / Report</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('students/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('students.index')}}">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">Students</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('students.create')}}">Create New</a></li>
                    <li><a href="{{route('students.index')}}">List / Report</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('sections/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('sections.index')}}">
                    <i class="fa fa-users"></i>
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
                    <i class="fa fa-users"></i>
                    <span class="nav-label">Classes</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('classes.create')}}">Create New</a></li>
                    <li><a href="{{route('classes.index')}}">List / Report</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('teachers/*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{route('teachers.index')}}">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">Teachers</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('teachers.create')}}">Create New</a></li>
                    <li><a href="{{route('teachers.index')}}">List / Report</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('admin/blog*'))  {{'active'}} @else {{''}} @endif">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                    <span class="nav-label">Admin Users</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="">Create New</a></li>
                    <li><a href="">Manage Admin</a></li>
                 </ul>
            </li>


        </ul>

    </div>
</nav>
