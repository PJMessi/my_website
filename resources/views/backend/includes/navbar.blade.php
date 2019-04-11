<!--sidebar left-->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="{{route("show_backend_dashboard")}}">
            <i class="fa fa-circle-notch text-primary"></i>
            <span class="smini-hide">
                <span class="font-w700 font-size-h5">ne</span> <span class="font-w400">4.1</span>
            </span>
        </a>
        <!-- END Logo -->

        <!-- Options -->
        <div>
           
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link @if($title == 'dashboard') active @endif" href="{{route("show_backend_dashboard")}}">
                    <i class="nav-main-link-icon si si-speedometer"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>

            <li class="nav-main-item">
                <a class="nav-main-link @if($title == 'contact') active @endif" href="{{route("show_backend_contact")}}">
                    <i class="nav-main-link-icon si si-call-end"></i>
                    <span class="nav-main-link-name">Contact</span>
                </a>
            </li>

            <li class="nav-main-heading">User Interface</li>
            <li class="nav-main-item">
                <a class="nav-main-link @if($title == 'main') active @endif" href="{{route('show_backend_main')}}">
                    <i class="nav-main-link-icon si si-energy"></i>
                    <span class="nav-main-link-name">Main Section</span>
                </a>
            </li>
                
            <li class="nav-main-item @if($title == 'about' || $title == 'about_item') open @endif">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-badge"></i>
                    <span class="nav-main-link-name">About Section</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'about') active @endif" href="{{route('show_backend_about')}}">
                            <span class="nav-main-link-name">Information</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'about_item') active @endif" href="{{route('show_backend_aitem')}}">
                            <span class="nav-main-link-name">Items</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-main-item @if($title == 'fact' || $title == 'fact_item') open @endif">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-magic-wand"></i>
                    <span class="nav-main-link-name">Fact Section</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'fact') active @endif" href="{{route('show_backend_fact')}}">
                            <span class="nav-main-link-name">Information</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'fact_item') active @endif" href="{{route('show_backend_fitem')}}">
                            <span class="nav-main-link-name">Items</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-main-item @if($title == 'resume' || $title == 'resume_item') open @endif">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-puzzle"></i>
                    <span class="nav-main-link-name">Resume Section</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'resume') active @endif" href="{{route('show_backend_resume')}}">
                            <span class="nav-main-link-name">Information</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'resume_item') active @endif" href="{{route('show_backend_ritem')}}">
                            <span class="nav-main-link-name">Items</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-main-item @if($title == 'skill' || $title == 'skill_item') open @endif">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-fire"></i>
                    <span class="nav-main-link-name">Skill Section</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'skill') active @endif" href="{{route('show_backend_skill')}}">
                            <span class="nav-main-link-name">Information</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'skill_item') active @endif" href="{{route('show_backend_sitem')}}">
                            <span class="nav-main-link-name">Items</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-main-item">
                <a class="nav-main-link @if($title == 'project') active @endif" href="{{route('show_backend_pitem')}}">
                    <i class="nav-main-link-icon si si-layers"></i>
                    <span class="nav-main-link-name">Project</span>
                </a>
            </li>

            <li class="nav-main-item @if($title == 'testmonial' || $title == 'testmonial_item') open @endif">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-grid"></i>
                    <span class="nav-main-link-name">Testmonial Section</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'testmonial') active @endif" href="{{route('show_backend_testmonial')}}">
                            <span class="nav-main-link-name">Information</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @if($title == 'testmonial_item') active @endif" href="{{route('show_backend_titem')}}">
                            <span class="nav-main-link-name">Items</span>
                        </a>
                    </li>
                </ul>
            </li> 


            <li class="nav-main-heading"></li>
            <li class="nav-main-item">
                <a class="nav-main-link @if($title == 'miscellaneous') active @endif" href="{{route("show_backend_miscellaneous")}}">
                    <i class="nav-main-link-icon fa fa-basketball-ball"></i>
                    <span class="nav-main-link-name">Miscellaneous</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>


<!-- topbar -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">

        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Toggle Mini Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!-- END Toggle Mini Sidebar -->
  
        </div>
        <!-- END Left Section -->


        <!-- Right Section -->
        <div class="d-flex align-items-center">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded" src="{{asset('storage/images/users/'. Auth::user()->avatar )}}" alt="Header Avatar" style="width: 18px;">
                    <span class="d-none d-sm-inline-block ml-1">{{Auth::user()->name}}</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-primary">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('storage/images/users/'. Auth::user()->avatar )}}" alt="">
                    </div>
                    <div class="p-2">
                        <h5 class="dropdown-header text-uppercase">User Options</h5>
                        
                        <a style="cursor:pointer" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#edit_profile_modal">
                            <span>Profile</span>
                            <span>
                                <i class="si si-user ml-1"></i>
                            </span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{route('register')}}">
                            <span>Add new user</span>
                            <i class="fa fa-user-plus"></i>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <h5 class="dropdown-header text-uppercase">Actions</h5>
                        
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span>{{ __('Log Out') }}</span>
                            <i class="si si-logout ml-1"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->

        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-white">
        <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->

</header>


<!--add new row modal-->
<div class="modal" id="edit_profile_modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Edit Profile</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <form action="{{route('edit_user')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="email">Email <small>You cannot change your Email.</small></label>
                            <input type="text" id="email" name="email" class="form-control form-control-alt" value="{{Auth::user()->email}}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="avatar" name="avatar">
                                <label class="custom-file-label" for="avatar">choose avatar</label>
                            </div>
                        </div>   
                           
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-alt" id="username" name="username" placeholder="enter your username" value="{{Auth::user()->username}}">
                        </div>  

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-alt" id="name" name="name" placeholder="enter your name" value="{{Auth::user()->name}}">
                        </div> 

                        <div class="form-group">
                            <label for="password">Password <small>Leave the fields below empty to keep using the old password.</small></label>
                            <input type="password" class="form-control form-control-alt" id="password" name="password" placeholder="enter new password" >
                        </div> 

                        <div class="form-group">                
                            <input type="password" class="form-control form-control-alt" id="password_confirmation" name="password_confirmation" placeholder="confirm new password" >
                        </div> 

                    </div>

                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-check mr-1"></i>Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>