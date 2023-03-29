<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$setting->translate(app()->getlocale())->content}}">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <title>{{$setting->translate(app()->getlocale())->title}}</title>
    <link rel="shortcut icon" href="{{asset($setting->favicon)}}" type="image/x-icon">
    <!-- Icons -->
    <link href="{{asset('adminAssets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('adminAssets/dest/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
</head>
<!-- BODY options, add following classes to body to change options
		1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
		2. 'sidebar-nav'		  - Navigation on the left
			2.1. 'sidebar-off-canvas'	- Off-Canvas
				2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		3. 'fixed-nav'			  - Fixed navigation
		4. 'navbar-fixed'		  - Fixed navbar
	-->

<body class="navbar-fixed sidebar-nav fixed-nav">
    {{-- ++++++++++++++++++++++++++++++++ Page Header : Navbar ++++++++++++++++++++++++  --}}
    <header class="navbar">
        <div class="container-fluid">
            {{-- ++++++++++++++++++ Logo ++++++++++++++++++++++++++ --}}
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" style="background-image:url({{asset($setting->logo)}});" href="#"></a>
            <ul  class="nav navbar-nav hidden-md-down">
                {{-- ++++++++++++++ Memubar icon ++++++++++++++ --}}
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>

                <!--<li class="nav-item p-x-1">
                    <a class="nav-link" href="#">داشبورد</a>
                </li>
                <li class="nav-item p-x-1">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item p-x-1">
                    <a class="nav-link" href="#">Settings</a>
                </li>-->
            </ul>
            <ul class="nav navbar-nav pull-left hidden-md-down">
                {{-- +++++++++++++ "username" And "status" +++++++++++++++ --}}
                <li class="nav-item dropdown">
                    {{auth()->user()->name}}
                    <strong>[{{auth()->user()->status}}]</strong>
                </li>

                <li class="nav-item dropdown">
                    {{-- ++++++++++++++ Settings Dropdown --}}
                    <a class="nav-link dropdown-toggle nav-link" style="margin:0px 20px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">{{(__('words.settings'))}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- ++++++ "user" settings ++++++ --}}
                        <div class="dropdown-header text-xs-center">
                            <strong>{{__('words.settings')}}</strong>
                        </div>
                        {{-- +++++++++++++++++ Edit "user settings" link +++++++++++++++++ --}}
                        <a class="dropdown-item" href="{{route('dashboard.users.edit',auth()->user()->id)}}">
                            <i class="fa fa-wrench"></i>{{__('words.userSettings')}}
                        </a>
                        <div class="divider"></div>
                        {{-- ++++++++++++++++++ Logout link +++++++++++++++++ --}}
                        <div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('words.logout') }}
                         </a>
                        {{-- ++++++++++++++++++ Logout Form +++++++++++++++++ --}}
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </div>
                    </div>
                </li>
                {{-- ++++++++++++ Languages Dropdown ++++++++++++ --}}
                <li class="nav-item dropdown">
                    {{-- ///////// Show "Current" Language ///////// --}}
                    <a class="nav-link dropdown-toggle nav-link" style="margin:0px 30px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                    </a>
                    {{-- ///////// Show Languages ///////// --}}
                    <div class="dropdown-menu dropdown-menu-right">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                            @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </header>
    {{-- ++++++++++++++++++++++++++++++++++++ Sidebar Page ++++++++++++++++++++++++++++++++++++ --}}
    @include('dashboard.layouts.sidebar')
    <!-- ++++++++++++++++++++++++++++++++++++ Main content ++++++++++++++++++++++++++++++++++++ -->
    <main class="main">
        @yield('body')
    </main>
    <!-- ++++++++++++++++++++++++++++++++++++ Footer ++++++++++++++++++++++++++++++++++++ -->
    <footer class="footer">
        <span class="pull-left">
            <a href="http://coreui.io">Eltokhey </a> &copy; 2023 creative Blogs
        </span>
        <span class="pull-right">
            Powered by <a href="http://coreui.io"> Eltokhey UI</a>
        </span>
    </footer>
    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('adminAssets/js/libs/jquery.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/libs/tether.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/libs/bootstrap.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/libs/pace.min.js')}}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('adminAssets/js/libs/Chart.min.js')}}"></script>

    <!-- CoreUI main scripts -->

    <script src="{{asset('adminAssets/js/app.js')}}"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    <script src="{{asset('adminAssets/js/views/main.js')}}"></script>

    <!-- Grunt watch plugin -->
    <script src="//localhost:35729/livereload.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        // $(document).ready(function () {
        //     $("#table_id").DataTable({
        //         processing: true,
        //     });
        // });
        let allEditors = document.querySelectorAll('#editor');
        for(let i = 0; i < allEditors.length; ++i) {
            ClassicEditor
                .create(allEditors[i], {
                    alignment: {
                        options: ['left', 'right', 'center', 'justify']
                    },
                });
        }

        $(document).ready(function() {
            $(".js-example-basic-multiple").select2();
        });
    </script>
    @stack('javascripts')
</body>

</html>
