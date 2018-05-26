@extends('layouts.master')

@section('title', 'Siteman | Mails')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? '') ])

@stop

@section('content')
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

  #tab{
    margin-top: 50px;
    margin-bottom: 50px;
  }
</style>

<div class="page_title ">
        <div class="container-fluid">

        <h1>Mail</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Mail</div>
         <br><br>
         <!-- <div class=" pull-right">
           <a class="btn btn-primary" href="#">
             Compose Mail
           </a>
        </div> -->

        </div>
     </div><br><br>

<div class="col-sm-12  pageset" style="margin-top:100px;">
  <div class="col-md-2">
    <div class="card" style="background-color: #081c22;">
      <nav class="panel-body">
        <div class="row">
          <div class=" text-center">
            <div class="row">
              <a data-toggle="modal" data-target="#messageModal"  class="btn btn-default btn-primary"> Compose</a>
              <!-- <a href="{{url('mailmessages/create')}}" class="btn btn-default btn-primary"> Compose</a> -->
            </div>
            <div class="row side-mess">
                   <strong><a href="#"> Inbox  <span class="badge"></span></a></strong>
                </div>
                <div class="row side-mess">
                  <a href="#">Sent Mail  <span class="badge"></span></a>
                </div>
                <div class="row side-mess">
                  <a href="#">Trash</a>
                </div>
          </div>
        </div>
      </nav>
    </div>
  </div>

  <div class="col-md-10">
    <div class="card">
      @if(isset($notifications))
      <!-- {{$notifications}} -->
      <table class="table">
        <tbody>
          @foreach($notifications as $notification)
          <tr>
            <td class="5%">
              <fieldset>
                          <input type="checkbox" id="checkbox1">
                      </fieldset>
            </td>
            <td class="25%">
              {{$users->firstWhere('id',$notification->from)->name}}
            </td>
            <td class="60%">
              <!-- <a href="{{url('employees/mails/showReceivedMail/'.$notification->id)}}"> -->
              <b>{{$notification->subject}} - </b> {{str_limit($notification->content, 30)}}
            </td>
            <td class="10%">
              {{$notification->created_at->format('H:i:s')}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
</div>
@include('shared.message_modal')
@stop