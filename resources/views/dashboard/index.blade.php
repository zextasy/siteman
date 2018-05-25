
@extends('layouts.master')
@section('styles_top')
  <link href="{{url('css/nprogress.css')}}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{url('dist/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="{{url('dist/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="{{url('dist/css/custom.min.css')}}" rel="stylesheet">
@stop
@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'dashboard') ])

@stop

@section('content')
    <div class="container body">
      <div class="container">

        <!-- /top navigation -->

        <!-- calculations -->
        @php
            $users_engineer_percentage = ($users_engineer->count() / $users->count()) * 100; 
            $users_admin_percentage = ($users_admin->count() / $users->count()) * 100;
            $users_others_count = $users->count() - ($users_engineer->count() + $users_admin->count() );
            $users_others_percentage = ($users_others_count / $users->count()) * 100;
            $projects_completed = $projects->where('status', 2);
            $projects_completed_percentage = ($projects_completed->count()/$projects->count()) * 100;
            $projects_pending = $projects->where('status', 0);
            $projects_pending_percentage = ($projects_pending->count()/$projects->count()) * 100;
            $tasks_completed = $tasks->where('task_status_id', 2);
            $tasks_completed_percentage = ($tasks_completed->count()/$tasks->count()) * 100;
            $tasks_pending = $tasks->where('task_status_id', 0);
            $tasks_pending_percentage = ($tasks_pending->count()/$tasks->count()) * 100;
            $reports_pending = $reports->where('approval_status', 0);
            $reports_pending_percentage = ($reports_pending->count()/$reports->count()) * 100;
            $reports_approved = $reports->where('approval_status', 1);
            $reports_approved_percentage = ($reports_approved->count()/$reports->count()) * 100;
            $reports_rejected = $reports->where('approval_status', 2);
            $reports_rejected_percentage = ($reports_rejected->count()/$reports->count()) * 100;
        @endphp

        <!-- caclulations -->

        <!-- page content -->
        <div class="right_col" role="main">  
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">{{ $users->count() }}</div>
              <span class="count_bottom"><i >{{ $users_admin->count() }}</i> admins</span>
              <span class="count_bottom"><i >{{ $users_engineer->count() }}</i> engineers</span>
              <span class="count_bottom"><i >{{ $users->count() - ($users_engineer->count() + $users_admin->count() ) }}</i> others</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Projects</span>
              <div class="count">{{ $projects->count() }}</div>
              <span class="count_bottom"><i >{{ $projects_completed->count() }}</i> completed</span>
              <span class="count_bottom"><i >{{ $projects_pending->count() }}</i> pending</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Tasks</span>
              <div class="count">{{ $tasks->count() }}</div>
              <span class="count_bottom"><i >{{ $tasks_completed->count() }} </i> completed</span>
              <span class="count_bottom"><i >{{ $tasks_pending->count() }}</i> pending</span>
            </div>            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Reports</span>
              <div class="count">{{ $reports->count() }}</div>
              <span class="count_bottom"><i >{{ $reports_pending->count() }}</i> pending</span>
              <span class="count_bottom"><i >{{ $reports_approved->count() }}</i> approved</span>
              <span class="count_bottom"><i >{{ $reports_rejected->count() }}</i> rejected</span>
            </div> 
          </div>
          <!-- /top tiles -->
          <br />

          <div class="row">


            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Users</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>User Summary</h4>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Admins</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $users_admin->count() }}" aria-valuemin="0" aria-valuemax="{{ $users->count() }}" style="width: {{ $users_admin_percentage }}%;">
                          <span class="sr-only">{{ $users_admin->count() }} of {{ $users->count() }} users</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{ $users_admin->count() }}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Engineers</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $users_engineer->count() }}" aria-valuemin="0" aria-valuemax="{{ $users->count() }}" style="width: {{ $users_engineer_percentage }}%;">
                          <span class="sr-only">{{ $users_engineer->count() }} of {{ $users->count() }} users</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{ $users_engineer->count() }}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Others</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $users_others_count }}" aria-valuemin="0" aria-valuemax="{{ $users->count() }}" style="width: {{ $users_others_percentage }}%;">
                          <span class="sr-only">{{ $users_others_count }} of {{ $users->count() }} users</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{ $users_others_count }}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>

<!-- Start projects -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Projects</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Project Summary</h4>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Completed</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$projects_completed->count()}}" aria-valuemin="0" aria-valuemax="{{$projects->count()}}" style="width: {{$projects_completed_percentage}}%;">
                          <span class="sr-only">{{ $projects_completed->count() }} of {{ $projects->count() }} projects</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{$projects_completed->count()}}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Pending</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$projects_pending->count()}}" aria-valuemin="0" aria-valuemax="{{$projects->count()}}" style="width: {{$projects_pending_percentage}}%;">
                          <span class="sr-only">{{ $projects_pending->count() }} of {{ $projects->count() }} projects</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{$projects_pending->count()}}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
<!-- End projects -->
          </div>
<!-- End first row -->
<!-- Start second row -->
              <div class="row">
<!-- Start tasks -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Tasks</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Task Summary</h4>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Completed</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$tasks_completed->count()}}" aria-valuemin="0" aria-valuemax="{{$tasks->count()}}" style="width: {{$tasks_completed_percentage}}%;">
                          <span class="sr-only">{{ $tasks_completed->count() }} of {{ $tasks->count() }} tasks</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{$tasks_completed->count()}}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Pending</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$tasks_pending->count()}}" aria-valuemin="0" aria-valuemax="{{$tasks->count()}}" style="width: {{$tasks_pending_percentage}}%;">
                          <span class="sr-only">{{ $tasks_pending->count() }} of {{ $tasks->count() }} tasks</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{$tasks_pending->count()}}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
<!-- End tasks -->

<!-- Start reports -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Reports</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Report Summary</h4>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Pending</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$reports_pending->count()}}" aria-valuemin="0" aria-valuemax="{{$reports->count()}}" style="width: {{$reports_pending_percentage}}%;">
                          <span class="sr-only">{{ $reports_pending->count() }} of {{ $reports->count() }} reports</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{$reports_pending->count()}}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Approved</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$reports_approved->count()}}" aria-valuemin="0" aria-valuemax="{{$reports->count()}}" style="width: {{$reports_approved_percentage}}%;">
                          <span class="sr-only">{{ $reports_approved->count() }} of {{ $reports->count() }} reports</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{$reports_approved->count()}}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Rejected</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$reports_rejected->count()}}" aria-valuemin="0" aria-valuemax="{{$reports->count()}}" style="width: {{$reports_rejected_percentage}}%;">
                          <span class="sr-only">{{ $reports_rejected->count() }} of {{ $reports->count() }} reports</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{$reports_rejected->count()}}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
<!-- End reports -->
                
              </div> <!-- end of second row -->
              
            </div> <!-- end of right col  main -->
          
        </div> <!-- end of page content -->
        
      </div> <!-- end of container -->
      
    </div> <!-- end of container body -->
    
@stop
@section('extras')
<!-- NProgress -->
    <script src="{{url('dist/nprogress/nprogress.js')}}"></script>
     <!-- bootstrap-progressbar -->
    <script src="{{url('dist/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{url('dist/js/iCheck/icheck.min.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{url('dist/js/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{url('dist/js/custom.min.js')}}"></script>
    <script src="{{url('dist/js/fastclick.js')}}"></script>
    <script src="{{url('dist/js/gauge.min.js')}}"></script>
    <script src="{{url('dist/skycons/skycons.js')}}"></script>
     <!-- Flot -->
    <script src="{{url('dist/js/Flot/jquery.flot.js')}}"></script>
    <script src="{{url('dist/js/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{url('dist/js/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{url('dist/js/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{url('dist/js/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{url('dist/js/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{url('dist/js/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{url('dist/js/flot.curvedlines/curvedLines.js')}}"></script>
    <script src="{{url('dist/js/DateJS/build/date.js')}}"></script>

    <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');

</script>
@stop