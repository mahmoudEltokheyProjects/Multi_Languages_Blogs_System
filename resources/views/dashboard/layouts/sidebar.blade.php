<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            {{-- ########################### "Dashoard" Link ########################### --}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.')}}"><i class="icon-speedometer"></i> {{__('words.dashboard')}}</a>
            </li>
            {{-- ########################### "Users" Link ########################### --}}
            @can('view', $setting)
                <hr style="color:white;background:white;">
                {{-- "user title" According to current "language" --}}
                <li class="nav-title">
                {{__('words.users')}}
                </li>
                <li class="nav-item">
                    {{-- ++++++++ "Add New User" Route ++++++++ --}}
                    <a class="nav-link" href="{{route('dashboard.users.create')}}">
                        <i class="icon-user-follow"></i>{{__('words.addUser')}}
                    </a>
                    {{-- ++++++++ "Show Users" Route ++++++++ --}}
                    <a class="nav-link" href="{{route('dashboard.users.index')}}">
                        <i class="icon-people"></i>{{__('words.users')}}
                    </a>
                </li>

            @endcan

            <hr style="color:white;background:white;">
            {{-- "category title" According to current "language" --}}
            <li class="nav-title">
                {{__('words.categories')}}
             </li>
            {{-- ########################### "Sections" Link ########################### --}}
            <li class="nav-item">
                {{-- ++++++++ Add "New Section" Route ++++++++ --}}
                @can('view', $setting)
                    <a class="nav-link" href="{{route('dashboard.category.create')}}">
                        <i class="icon-user-follow"></i>{{__('words.addCategory')}}
                    </a>
                @endcan
                {{-- ++++++++ "Show Sections" Route ++++++++ --}}
                <a class="nav-link" href="{{route('dashboard.category.index')}}">
                    <i class="icon-people"></i>{{__('words.categories')}}
                </a>
            </li>
            <hr style="color:white;background:white;">
            {{-- ########################### "Posts" Link ########################### --}}
            <li class="nav-title">
                {{__('words.posts')}}
             </li>
            <li class="nav-item">
                {{-- ++++++++ "Add New Post" Route ++++++++ --}}
                <a class="nav-link" href="{{route('dashboard.posts.create')}}">
                    <i class="icon-user-follow"></i>{{__('words.addPost')}}
                </a>
                {{-- ++++++++ "Show Posts" Route ++++++++ --}}
                <a class="nav-link" href="{{route('dashboard.posts.index')}}">
                    <i class="icon-people"></i>{{__('words.posts')}}
                </a>
            </li>
            {{-- ########################### "Settings" Link ########################### --}}
            @can('view', $setting)
                <hr style="color:white;background:white;">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.settings')}}">
                        <i class="icon-people"></i> {{__('words.settings')}}
                    </a>
                </li>
            @endcan
        </ul>
    </nav>
</div>
