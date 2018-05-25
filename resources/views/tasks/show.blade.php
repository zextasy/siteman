@extends('layouts.master')

@section('title')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Tasks') ])

@stop

@section('contents')

<style type="text/css">
   /* #design_container{

  margin-top:  50px;

  } */

  .timer{
    margin-top: 50px;
  }

.card-des{
  border-color: #081c22;
  border-style: solid;
       padding:20px 80px 20px 40px;
       border-radius:5%;
       color:#000;
       font-size:20px;
       text-align: center;
       margin: 5px;
}
	.btn-info{
		background-color: #4c0019;
		border-color: #4c0019;
	}

	.btn-primary{
		background-color: #ff8100;
		border-color: #ff8100;

	}

	.btn-primary.active, .btn-primary.focus, .btn-primary:active, .btn-primary:focus, .btn-primary:hover, .open>.dropdown-toggle.btn-primary{
		background-color: #081c22;
		border-color: #081c22;
	}

	.btn-info.active, .btn-info.focus, .btn-info:active, .btn-info:focus, .btn-info:hover, .open>.dropdown-toggle.btn-info{
		background-color: #081c22;
		border-color: #081c22;
	}
  #counter{
    margin: 20px 0px 50px 200px;


  }
</style>

<div class="page_title ">
        <div class="container">

        <div align="center"><h1>View Tasks</h1></div>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Tasks</div>
         <br><br>
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('tasks/')}}">
             All Task
           </a>
           <a class="btn btn-success" href="{{url('tasks/edit/'.$tasks->id)}}">
            Edit Task
           </a>
           <a class="btn btn-danger" href="{{url('tasks/delete/'.$tasks->id)}}">
             Delete Task
           </a>
        </div>

        </div>
     </div>

     <div>

     </div><br><br>

<div class="container" id="design_container">
  <div class="col-md-offset-2 col-md-8">
    <div class="card timer">
    <table class="table table-hover table-bordered">
      <tbody>
        <tr>
        <td><strong>Task Title</strong></td>
      <td><h5>{{$tasks->task_name}}</h5></td></tr>

    <tr><td><strong>Task Description</strong></td>
    <td><h5>{{$tasks->task_description}}</h5></td></tr>

  <tr><td><strong>
    Start Date
  </strong></td>
  <td><h5>{{date('d F, Y', strtotime($tasks->start_date))}}</h5>
  </td></tr>

  <td><strong>
    End Date
  </strong></td>
  <td><h5>{{date('d F, Y', strtotime($tasks->end_date))}}</h5>
  </td>

  <tr><td><strong>Assigned To </strong></td>
  <td><h5>{{$tasks->assignedTo->name}}</h5></td></tr>

  <tr><td><strong>Assigned By</strong></td>
  <td><h5>{{$tasks->assignedBy->name}}</h5></td></tr>
  {{-- {{$tasks->reports}} --}}
    <tr><td><strong>Reports</strong></td>
  <td></td></tr>
  @foreach($tasks->reports as $report)
  <tr><td><strong>{{$report->form->name}}</strong></td>
  <td><strong>Status: {{$report->showStatus()}}</strong></td></tr>
  @endforeach



    <!-- <div class="form-group">
      <div class="col-md-5">
        <label for="" class="control-label">
          Task Description
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{$tasks->task_description}}</h5>
      </div>
    </div> -->

    <!-- <div class="form-group">
      <div class="col-md-5">
        <label for="" class="control-label">
            Start Date
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{date('d F, Y', strtotime($tasks->start_date))}}</h5>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-5">
        <label for="" class="control-label">
            End Date
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{date('d F, Y', strtotime($tasks->end_date))}}</h5>
      </div>
    </div> -->

    <!-- <div class="form-group">
      <div class="col-md-5">
        <label for="" class="control-label">
          Assigned To
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{$tasks->assignedTo->name}}</h5>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-5">
        <label for="" class="control-label">
          Assigned By
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{$tasks->assignedBy->name}}</h5>
      </div>
    </div> -->

  </div>
</tbody>
</table>
  </div>
</div>
<div class="container" id="counter">
  <div class="col-md-offset-2 col-md-8">
    <div class="row" id="time" style="display:none">
          <div class="col-sm-2 card-des">
          <div class="card" id="days"> </div>
          </div>
          <div class="col-sm-2 card-des">
          <div class="card" id="hours"> </div>
          </div>
          <div class="col-sm-2 card-des">
          <div class="card" id="minutes"> </div>
          </div>
          <div class="col-sm-2 card-des">
          <div class="card" id="seconds"> </div>
          </div>
    </div>
  </div>
</div>

<div class="row" id="count">
  <div class="col-sm-8 col-sm-offset-2">
      <div class="row" id="demo" style="display:none">
            <div class="alert alert-warning">
                    <div class="container-fluid">
                    <div class="alert-icon">
                        <i class="">info</i>
                    </div>

                    <span>Task Status:<b>OVERDUE</b> </span>
                    </div>
        </div>
      </div>
        <div class="">

        </div>
      </div>
    </div>




<script type="text/javascript">


      var endDate = new Date("{{date('F d, Y', strtotime($tasks->end_date))}}").getTime();

      var x = setInterval(function() {
          var startDate = new Date().getTime();

      var distance = endDate - startDate;


      //Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"

          document.getElementById("time").style.display = "block";
          document.getElementById("demo").style.display = "none";
          document.getElementById("days").innerHTML = days +"<br><span>Days<span>";
          document.getElementById("hours").innerHTML = hours +"<br><span>Hours<span>";
          document.getElementById("minutes").innerHTML = minutes +"<br><span>Mins<span>";
          document.getElementById("seconds").innerHTML = seconds +"<br><span>Secs<span>";

          // If the count down is over, write some text
          if (distance < 0) {
              clearInterval(x);
              document.getElementById("demo").style.display = "block";
              document.getElementById("time").style.display = "none";
              document.getElementById("days").innerHTML = "";
              document.getElementById("hours").innerHTML = "";
              document.getElementById("minutes").innerHTML = "";
              document.getElementById("seconds").innerHTML = "";
          }

      console.log(days);
      console.log(hours+'hrs');

      }, 1000);


</script>

@stop
