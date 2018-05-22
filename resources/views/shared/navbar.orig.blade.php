<div class="container">
      <div class="navbar navbar-default yamm">

        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle two three"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          <a href="index.html" class="navbar-brand"><img src="{{url('images/siteman.png')}}" alt=""/ style="height: 60px"></a> </div>

        <div id="navbar-collapse-grid" class="navbar-collapse collapse pull-right">
          <ul class="nav navbar-nav">
               @if(Auth::check())
              <li class="dropdown @if($active == 'home') active @endif"><a href="{{url('home')}}" class="dropdown-toggle">Home</a>


                </li>
                @if(Gate::check('manage_users') || Gate::check('create_users')|| Gate::check('view_users')|| Gate::check('edit_users')|| Gate::check('delete_users'))
                <li class="dropdown @if($active == 'users') active @endif" ><a href="#" class="dropdown-toggle">Users</a>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="{{url('users/admin/')}}">Users</a></li>
                    <li><a href="{{ route('admin.users.index') }}">User Roles</a></li>
                    <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                    <li><a href="{{ route('admin.permissions.index') }}">Permissions</a></li>

                </ul>

                </li>
                @endif
                @if(Gate::check('site_audit'))
                    <li class="dropdown @if($active == 'site_audit') active @endif"><a href="#" class="dropdown-toggle">Site Audit</a>
                     <ul class="dropdown-menu" role="menu">
                      @foreach($site_audits as $site_audit)
                          <li><a href="{{url('site_audit/'.$site_audit->name)}}">{{$site_audit->name}}</a></li>

                      @endforeach
                      </ul>

                    </li>
                @endif
                @if(Gate::check('tower_mapping'))
                  <li class="dropdown @if($active == 'tower_mapping') active @endif"> <a href="#" class="dropdown-toggle">Tower Mapping</a>
                  <ul class="dropdown-menu" role="menu">
                @foreach($tower_mappings as $tower_mapping)
                    <li><a href="{{url('tower_mapping/'.$tower_mapping->name)}}">{{$tower_mapping->name}}</a></li>

                @endforeach
                </ul>

                </li>
                @endif
                @if(Gate::check('manage_template'))
                  <li class="dropdown @if($active == 'template') active @endif"><a href="{{url('template')}}" class="dropdown-toggle">Template</a>


                  </li>
                @endif
                @if(Gate::check('create_project') || Gate::check('view_project')|| Gate::check('edit_project')|| Gate::check('delete_project')|| Gate::check('create_task')|| Gate::check('view_task')|| Gate::check('edit_task')|| Gate::check('delete_task'))
                    <li class="dropdown @if($active == 'project') active @endif"> <a href="#" class="dropdown-toggle">Projects </a>
                    <ul class="dropdown-menu" role="menu">
                      @if(Gate::check('create_project') || Gate::check('view_project')|| Gate::check('edit_project')|| Gate::check('delete_project'))
                      <li><a href="{{url('projects/')}}">Projects</a></li>
                      <li><a href="{{url('tasks/')}}">Tasks</a></li>
                      <hr>
                    @endif
                    <li><a href="{{url('tasks/my/')}}">My Tasks</a></li>
                </ul>

                </li>
                @endif
                @if(Gate::check('view_dashboard'))
                   <li class="dropdown @if($active == 'dashboard') active @endif" ><a href="{{url('dashboard/')}}" class="dropdown-toggle">Dashboard</a>

                  </li>
                @endif
                <li class="dropdown" class="dropdown-toggle">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                 {{--@guest--}}
                 @else

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>


                        {{--@endguest--}}

                @endif

              </ul>
        </div>
      </div>
    </div>