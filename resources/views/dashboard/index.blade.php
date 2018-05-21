
@extends('layouts.master')
@section('styles')
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

@section('contents')
    <div class="container body">
      <div class="main_container">

        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">  
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">{{ $users->count() }}</div>
              <span class="count_bottom"><i >4 </i> admins</span>
              <span class="count_bottom"><i >3 </i> engineers</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Tasks</span>
              <div class="count">{{ $tasks->count() }}</div>
              <span class="count_bottom"><i >{{ $tasks->where('task_status_id', 2)->count() }} </i> completed</span>
              <span class="count_bottom"><i >{{ $tasks->where('task_status_id', 0)->count() }}</i> pending</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Projects</span>
              <div class="count">{{ $projects->count() }}</div>
              <span class="count_bottom"><i >{{ $projects->where('created_by', 1)->count() }}</i> completed</span>
              <span class="count_bottom"><i >{{ $projects->where('created_by', 0)->count() }}</i> pending</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Reports</span>
              <div class="count">{{ $forms->count() }}</div>
              <span class="count_bottom"><i >{{ $forms->where('template_id', 1)->count() }}</i> approved</span>
              <span class="count_bottom"><i >{{ $forms->where('template_id', 2)->count() }}</i> rejected</span>
            </div> 
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Network Activities <small>{{-- Graph title sub-title --}}</small></h3>
                  </div>
{{--                   <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div> --}}
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top Campaign Performance</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Facebook Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Twitter Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Conventional Media</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Bill boards</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
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
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $users->count()/2 }}" aria-valuemin="0" aria-valuemax="{{ $users->count() }}" style="width: 66%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{ $users->count() }}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Engineers</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $users->count()/2}}" aria-valuemin="0" aria-valuemax="{{ $users->count() }}" style="width: {{ $users->count()/2 }}%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{ $users->count() }}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>


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
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>123k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Pending</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>53k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>

          </div>






              <div class="row">


                <!-- Start projects -->

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Projects</h2>
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
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>123k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Pending</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>53k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
                <!-- End projects -->

                <!-- start of reports widget -->

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
                      <span>Approved</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>123k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Rejected</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>53k</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
                <!-- end of reports widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>
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