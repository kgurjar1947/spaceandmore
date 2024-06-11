<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sheltos - Admin dashboard page">
    <meta name="keywords" content="sheltos">
    <meta name="author" content="sheltos">
    <link rel="icon" href="{{url('/')}}/assets/images/favicon.png" type="image/x-icon" />
    <title>Space & More Admin dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
	
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/animate.css">

    <!-- Template css -->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/admin.css">

</head>

<body>

    <!-- Loader start -->
    <div class="loader-wrapper">
        <div class="row loader-img">
            <div class="col-12">
                <img src="{{url('/')}}/assets/images/loader/loader-2.gif" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <!-- Loader end -->
    
    <div class="page-wrapper">

        <!-- page header start -->
        <div class="page-main-header row">
            <div id="sidebar-toggle" class="toggle-sidebar col-auto">
                <i data-feather="chevrons-left"></i>
            </div>
            <div class="nav-right col p-0">
                <ul class="header-menu">
                    <li>
                        <!-- <div class="d-md-none mobile-search"> -->
                            <!-- <i data-feather="search"></i> -->
                        <!-- </div> -->
                        <!-- <div class="form-group search-form"> -->
                            <!-- <!-- <input type="text" class="form-control" placeholder="Search here..."> -->
                        <!-- </div> -->
                    </li>
                    @if(auth()->user()->type == 'super_admin')
                    <!--<li>-->
                    <!--    <form method="post" action="{{route('admin.all.export.csv')}}">-->
                    <!--                 @csrf-->
                    <!--            <button id="export" class="btn btn-success btn-sm" type="submit">Export All</button>-->
                    <!--    </form>-->
                    <!--</li>-->
                    @endif
                    <li>
                        <a href="#!" onclick="javascript:toggleFullScreen()">
                            <i data-feather="maximize"></i>
                        </a>
                    </li>

                    
                    <!--<li class="onhover-dropdown notification-box">-->
                        <!--<a href="javascript:void(0)">-->
                            <!--<i data-feather="bell"></i>-->
                            <!--<span class="label label-shadow label-pill notification-badge">3</span>-->
                        </a>
                        <!--<div class="notification-dropdown onhover-show-div">-->
                            <!--<div class="dropdown-title">-->
                            <!--    <h6>Notifications</h6>-->
                            <!--    <a href="favourites.html">Show all</a>-->
                            <!--</div>-->
                            <!--<ul>-->
                            <!--    <li>-->
                            <!--        <div class="media">-->
                            <!--            <div class="icon-notification bg-primary-light">-->
                            <!--                <i class="fab fa-xbox"></i>-->
                            <!--            </div>-->
                            <!--            <div class="media-body">-->
                            <!--                <h6>Item damaged</h6>-->
                            <!--                <span>8 hours ago, Tadawis 24</span>-->
                            <!--                <p class="mb-0">"the table is broken:("</p>-->
                            <!--                <ul class="user-group">-->
                            <!--                    <li>-->
                            <!--                        <a href="javascript:void(0)">-->
                            <!--                            <img src="{{url('/')}}/assets/images/about/4.jpg" class="img-fluid" alt="">-->
                            <!--                        </a>-->
                            <!--                    </li>-->
                            <!--                    <li class="reply">-->
                            <!--                        <a href="javascript:void(0)">-->
                            <!--                            Reply-->
                            <!--                        </a>-->
                            <!--                    </li>-->
                            <!--                </ul>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        <div class="media">-->
                            <!--            <div class="icon-notification bg-success-light">-->
                            <!--                <i class="fas fa-file-invoice-dollar"></i>-->
                            <!--            </div>-->
                            <!--            <div class="media-body">-->
                            <!--                <h6>Payment received</h6>-->
                            <!--                <span>2 hours ago, Bracka 15</span>-->
                            <!--                <ul class="user-group">-->
                            <!--                    <li>-->
                            <!--                        <a href="javascript:void(0)">-->
                            <!--                            <img src="{{url('/')}}/assets/images/about/1.jpg" class="img-fluid" alt="">-->
                            <!--                        </a>-->
                            <!--                    </li>-->
                            <!--                    <li>-->
                            <!--                        <a href="javascript:void(0)">-->
                            <!--                            <img src="{{url('/')}}/assets/images/about/2.jpg" class="img-fluid" alt="">-->
                            <!--                        </a>-->
                            <!--                    </li>-->
                            <!--                    <li>-->
                            <!--                        <a href="javascript:void(0)">-->
                            <!--                            <img src="{{url('/')}}/assets/images/about/3.jpg" class="img-fluid" alt="">-->
                            <!--                        </a>-->
                            <!--                    </li>-->
                            <!--                </ul>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        <div class="media">-->
                            <!--            <div class="icon-notification bg-warning-light">-->
                            <!--                <i class="fas fa-comment-dots"></i>-->
                            <!--            </div>-->
                            <!--            <div class="media-body">-->
                            <!--                <h6>New inquiry</h6>-->
                            <!--                <span>1 Days ago, Krowada 7</span>-->
                            <!--                <p class="mb-0">"is the villa still available?"</p>-->
                            <!--                <ul class="user-group">-->
                            <!--                    <li>-->
                            <!--                        <a href="javascript:void(0)">-->
                            <!--                            <img src="{{url('/')}}/assets/images/about/2.jpg" class="img-fluid" alt="">-->
                            <!--                        </a>-->
                            <!--                    </li>-->
                            <!--                    <li>-->
                            <!--                        <a href="javascript:void(0)">-->
                            <!--                            <img src="{{url('/')}}/assets/images/about/3.jpg" class="img-fluid" alt="">-->
                            <!--                        </a>-->
                            <!--                    </li>-->
                            <!--                    <li class="reply">-->
                            <!--                        <a href="javascript:void(0)">-->
                            <!--                            Reply-->
                            <!--                        </a>-->
                            <!--                    </li>-->
                            <!--                </ul>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </li>-->
                            <!--</ul>-->
                        <!--</div>-->
                    <!--</li>-->
                    <li class="onhover-dropdown">
                        <a href="{{route('admin.restore.list')}}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <!--<div class="notification-dropdown chat-dropdown onhover-show-div">-->
                        <!--    <div class="dropdown-title">-->
                        <!--        <h6>Messages</h6>-->
                        <!--        <a href="#">View all</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </li>
                    <li><h6 class="pt-2">Welcome {{auth()->user()->name}}!</h6></li>
                    <li class="profile-avatar onhover-dropdown">
                        <div>
                            <img src="{{url('/')}}/assets/images/avatar/3.jpg" class="img-fluid" alt="">
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <!-- <li><a href="user-profile.html"><span>Account </span><i data-feather="user"></i></a></li> -->
                            <li><a href="{{route('admin.list.property')}}"><span>Listing</span><i data-feather="file-text"></i></a></li>
                            <li><a href="{{route('logout')}}"><span>Logout</span><i data-feather="log-in"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        
        <!-- page header end -->
        <div class="page-body-wrapper">

            <!-- page sidebar start -->
            <div class="page-sidebar">
                <div class="logo-wrap">
                @if(auth()->user()->type == 'super_admin')
                    <a href="{{route('admin.dashboard')}}">
                        <img src="{{url('/')}}/assets/images/logo.jpg" class="img-fluid for-light" alt="">
                        <img src="{{url('/')}}/assets/images/logo.jpg" class="img-fluid for-dark" alt="">
                    </a>
                    @elseif(auth()->user()->type == 'admin')
                    <a href="{{route('user.admin.dashboard')}}">
                        <img src="{{url('/')}}/assets/images/logo.jpg" class="img-fluid for-light" alt="">
                        <img src="{{url('/')}}/assets/images/logo.jpg" class="img-fluid for-dark" alt="">
                    </a>
                    @endif
                    <div class="back-btn d-lg-none d-inline-block">
                        <i data-feather="chevrons-left"></i>
                    </div>
                </div>
                <div class="main-sidebar">
                    <div id="mainsidebar">
                        <ul class="sidebar-menu custom-scrollbar">
                            
                            @if(auth()->user()->type == 'super_admin')
                            <li class="sidebar-item">
                                <a href="{{route('admin.dashboard')}}" class="sidebar-link only-link">
                                    <i data-feather="airplay"></i> 
                                    <span>Dashboard</span>
                                </a>
                            </li>
							 <li class="sidebar-item">
                                <a href="{{route('admin.category')}}" class="sidebar-link only-link">
                                    <i data-feather="airplay"></i> 
                                    <span>Category</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link">
                                    <i data-feather="grid"></i> 
                                    <span>My Properties</span>
                                </a>
                                <ul class="nav-submenu menu-content">
                                    <li>
                                        <a href="{{route('admin.add.property')}}">
                                            <i data-feather="chevrons-right"></i>
                                            Post Property
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.list.property')}}">
                                            <i data-feather="chevrons-right"></i>
                                            Enabled List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.approve.property')}}">
                                            <i data-feather="chevrons-right"></i>
                                            Approval Pending List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.favourites.property')}}">
                                            <i data-feather="chevrons-right"></i>
                                             Hot List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.disable.property')}}">
                                            <i data-feather="chevrons-right"></i>
                                            Disabled List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.enquires')}}" class="sidebar-link only-link">
                                <i data-feather="mail"></i>
                                    <span>Property - Enquiry</span>
                                </a>
                            </li>
                            
                             <li class="sidebar-item">
                                <a href="{{route('admin.contacts')}}" class="sidebar-link only-link">
                                <i data-feather="mail"></i>
                                    <span>Contact Us- Enquiry</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.agent.list')}}" class="sidebar-link only-link">
                                   <i class="fa fa-user" aria-hidden="true"></i>
                                     <span>Agent</span>
                                </a>
                            </li>
                             <li class="sidebar-item">
                                <a href="{{route('admin.executive.name')}}" class="sidebar-link only-link">
                                   <i class="fa fa-user" aria-hidden="true"></i>
                                     <span>Executive Name</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.location')}}" class="sidebar-link only-link">
                                    <i data-feather="map-pin"></i>
                                    <span>Location</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.bhk')}}" class="sidebar-link only-link">
                                <i class="fa fa-bed" aria-hidden="true"></i>
                                    <span>BHK</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.facing')}}" class="sidebar-link only-link">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                    <span>Facing</span>
                                </a>
                            </li>
                            <!--<li class="sidebar-item">-->
                            <!--    <a href="{{route('admin.floor')}}" class="sidebar-link only-link">-->
                            <!--    <i class="fa fa-building" aria-hidden="true"></i>-->
                            <!--        <span>Floor</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            @elseif(auth()->user()->type == 'admin')
                            <li class="sidebar-item">
                                <a href="{{route('user.admin.dashboard')}}" class="sidebar-link only-link">
                                    <i data-feather="airplay"></i> 
                                    <span>Dashboard</span>
                                </a>
                            </li>
							
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link">
                                    <i data-feather="grid"></i> 
                                    <span>My properties</span>
                                </a>
                                <ul class="nav-submenu menu-content" style="display: block !important;">
                                    <li>
                                        <a href="{{route('user.admin.add.property')}}">
                                            <i data-feather="chevrons-right"></i>
                                            Post Property
                                        </a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{route('user.admin.list.property')}}">
                                            <i data-feather="chevrons-right"></i>
                                            Enabled List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.admin.favourites.property')}}">
                                            <i data-feather="chevrons-right"></i>
                                              Hot List
                                        </a>
                                    </li>
                                     <li>
                                        <a href="{{route('user.disable.property')}}">
                                            <i data-feather="chevrons-right"></i>
                                            Disabled List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            <li class="sidebar-item">
                                        <a href="{{route('logout')}}" class="sidebar-link only-link">
                                            <i data-feather="log-in"></i>
                                            Logout
                                        </a>
                                    </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- page sidebar end -->