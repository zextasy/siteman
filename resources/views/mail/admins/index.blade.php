@extends('layouts.master')

@section('title', 'Siteman | E-mail')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'E-mail') ])

@stop


@section('contents')
<style type="text/css">
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

  table{
    width: 100%;
  }
  td{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even){
    background-color: #dddddd;
  }

.side-mess{
  padding:10px 0px 10px 0px;
  background-color:#ff8100;
  border: 10px solid #dddddd;
}
.btn-default{
  background-color: #4c0019;
}

</style>

<div class="page_title ">
        <div class="container">

        <h1>Email</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Email</div>
        </div>
     </div>


<div class="container">
  <div class="col-md-2">
    <nav class="panel-body">
         <div class="row">
        <div class=" text-center">
      <div class="row side-mess">

          <a href="{{url('mail/admins/sendMail')}}" class=""><strong> Compose</strong></a>

      </div>
      <div class="row side-mess">
        <strong><a href="#"> Inbox  <span class="badge"></span></a></strong>
      </div>


       <div class="row side-mess">
         <a href="#"><strong> Sent Mail </strong> <span class="badge"> </span></a>
       </div>

       <div class="row side-mess">
         <a href="#"><strong>Draft</strong></a>
       </div>

    </div>
    </div>
    </nav>

  <!-- <nav class="navbar narbar-toggleable-md visible-sm visible-xs" >
  <ul class="nav" id="email_nav">
    <li class="active">
          Compose
        </li>
    <li><a href="#"> Inbox <span class="badge"> </span></a></li>
    <li><a href="#">Sent Mail  <span class="badge"> </span></a></li>
    <li><a href="#">Draft</a></li>
  </ul>
</nav> -->


  </div>

  <div class="col-md-10">
      <div class="panel-body">
       <table class="table-bordered">

    <tbody>
       @foreach($message as $msg)

        <tr class="">

            <td width="5%">
                <fieldset class="">
                    <input type="checkbox" id="checkbox1">
                </fieldset>
            </td>


            <td width="60%">
              <a href="{{url('mail/admins/recievedMail/'.$msg->id)}}">
              <b>{{$msg->title}} - </b> &nbsp; {{str_limit($msg->body, 30) }} </td>

<!--             title, header, some part of thebody -->
               </a>
            <td width="10%">
                {{$msg->created_at->format('H:i:s')}}
            </td>

        </tr>

       @endforeach

      </tbody>
</table>
  </div>
  </div>

</div>

@stop
