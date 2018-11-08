<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product Data Management System</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{asset('plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{asset('plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/sweetalert/sweetalert.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
            <div class="top-left-part"><a class="logo" href="{{url('/')}}"><b><img src="../plugins/images/pixeladmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="../plugins/images/pixeladmin-text.png" alt="home" /></span></a></div>
            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                <li>
                    <form role="search" class="app-search hidden-xs">
                        <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">

                        @if($user->image != null)
                            <img src="{{asset('uploads/suppliers/'.$user->image)}}" alt="user-img" width="36" class="img-circle">
                        @else
                            <img src="{{asset('uploads/suppliers/avatar.png')}}" alt="user-img" width="36" class="img-circle">
                        @endif
                        <b class="hidden-xs">{{$user->name}}</b>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        {{--<li><a href="#"><i class="ti-user"></i> My Profile</a></li>--}}
                        {{--<li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>--}}
                        {{--<li><a href="#"><i class="ti-email"></i> Inbox</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        <li><a href="{{ route('account-settings') }}"><i class="ti-settings"></i> Account Setting</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- .Megamenu -->
                <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                    <!-- input-group -->
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                    <!-- /input-group -->
                </li>
                <li class="user-pro">
                    <a href="#" class="waves-effect">
                        @if($user->image != null)
                            <img src="{{asset('uploads/suppliers/'.$user->image)}}" alt="user-img" class="img-circle">
                        @else
                            <img src="{{asset('uploads/suppliers/avatar.png')}}" alt="user-img" class="img-circle">
                        @endif
                        <span class="hide-menu"> {{$user->name}}<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        {{--<li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>--}}
                        {{--<li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>--}}
                        {{--<li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>--}}
                        <li><a href="{{ route('account-settings') }}"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <li><a href="{{url('/home')}}" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu">Dashboard</span></a></li>

              @if($user->role == 'supplier')
                <li><a href="#" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Customers<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">New</span></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('customer-create')}}">Add Customer</a></li>
                        <li><a href="{{route('customer-list')}}" class="waves-effect">Customer list</a></li>
                    </ul>
                </li>
                    <li><a href="#" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Products <span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">New</span></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('product-create')}}">Add product</a></li>
                        <li><a href="{{route('product-list')}}" class="waves-effect">Product list</a></li>
                    </ul>
                </li>
                <li> <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Brands<span class="fa arrow"></span>
                            {{--<span class="label label-rouded label-info pull-right">13</span> --}}
                        </span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('brand-create')}}">Add Brand</a></li>
                        <li><a href="{{route('brand-list')}}">Brand list</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Color<span class="fa arrow"></span>
                            {{--<span class="label label-rouded label-info pull-right">7</span> --}}
                        </span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('color-create')}}">Add Color</a></li>
                        <li><a href="{{route('color-list')}}">Color list</a></li>
                    </ul>
                </li>
                @elseif($user->role == 'customer')
                    <li><a href="inbox.html" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Buyer Menu1 <span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">New</span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="chat.html">Seller SubMenu</a></li>
                            <li><a href="javascript:void(0)" class="waves-effect">Buyer SubMenu</a></li>
                            <li><a href="javascript:void(0)" class="waves-effect">Buyer SubMenu</a>
                            </li>
                        </ul>
                    </li>
                    <li> <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Buyer Menu2<span class="fa arrow"></span> <span class="label label-rouded label-info pull-right">13</span> </span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="panels-wells.html">Buyer SubMenu</a></li>
                            <li><a href="panel-ui-block.html">Buyer SubMenu</a></li>
                            <li><a href="buttons.html">Buyer SubMenu</a></li>
                            <li><a href="sweatalert.html">Buyer SubMenu</a></li>
                        </ul>
                    </li>
                  @elseif($user->role == 'super_admin')
                    <li><a href="inbox.html" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Admin<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">New</span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)" class="waves-effect">Tasks</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Sizes<span class="fa arrow"></span> <span class="label label-rouded label-info pull-right">13</span> </span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('size-create')}}">Add Size</a></li>
                            <li><a href="{{route('size-list')}}">Size list</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Seasons<span class="fa arrow"></span> <span class="label label-rouded label-info pull-right">13</span> </span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('season-create')}}">Add Season</a></li>
                            <li><a href="{{route('showSeason')}}">Season list</a></li>
                        </ul>
                    </li>
                  @endif
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            @yield('content')
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                    <div class="r-panel-body">
                        <ul>
                            <li><b>Layout Options</b></li>
                            <li>
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox1" type="checkbox" class="fxhdr">
                                    <label for="checkbox1"> Fix Header </label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-warning">
                                    <input id="checkbox2" type="checkbox" class="fxsdr">
                                    <label for="checkbox2"> Fix Sidebar </label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox checkbox-success">
                                    <input id="checkbox4" type="checkbox" class="open-close">
                                    <label for="checkbox4"> Toggle Sidebar </label>
                                </div>
                            </li>
                        </ul>
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" theme="default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                            <li><a href="javascript:void(0)" theme="blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
                            <li><b>With Dark sidebar</b></li>
                            <br/>
                            <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                            <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                            <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
                        </ul>
                        <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.right-sidebar -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
        <!-- jQuery -->
        <script src="{{asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
        <!--slimscroll JavaScript -->
        <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
        <!--Wave Effects -->
        <script src="{{asset('js/waves.js')}}"></script>
        <!--Counter js -->
        <script src="{{asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
        <script src="{{asset('plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
        <!--Morris JavaScript -->
        <script src="{{asset('plugins/bower_components/raphael/raphael-min.js')}}"></script>
        <script src="{{asset('plugins/bower_components/morrisjs/morris.js')}}"></script>
        <!-- Custom Theme JavaScript -->
        <script src="{{asset('js/custom.min.js')}}"></script>
        <script src="{{asset('js/dashboard1.js')}}"></script>
        <!-- Sparkline chart JavaScript -->
        <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js')}}"></script>
        <script src="{{asset('plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
        <script src="{{ asset('plugins/bower_components/sweetalert/sweetalert.min.js') }}"></script>

<!-- Latest compiled and minified JavaScript -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}

{{--<!-- (Optional) Latest compiled and minified JavaScript translation files -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>--}}

        <script type="text/javascript">

        </script>
        <!--Style Switcher -->
        <script src="{{asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
        <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
