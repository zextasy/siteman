@inject('request', 'Illuminate\Http\Request')
@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Users') ])

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
</style>

<div class="page_title ">
        <div class="container">

        <h1>Users</h1>
         <div class="pagenation">&nbsp;<a href="{{ route('admin.users.create') }}" class="btn btn-primary">@lang('global.app_add_new')</a>  <i>/</i>Users</div>
         <br><br>
        <!--  <div class=" pull-right">
           <a class="btn btn-primary" href="#">
             New User
           </a>
        </div> -->

        </div>
     </div>
    <!-- <h3 class="page-title">@lang('global.users.title')</h3> -->
    <!-- <p>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p> -->
    <br><br>

    <div class="panel panel-default">
        <!-- <div class="panel-heading">
            @lang('global.app_list')
        </div> -->

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;">{{-- <input type="checkbox" id="select-all" /> --}}</th>

                        <th>@lang('global.users.fields.name')</th>
                        <th>@lang('global.users.fields.email')</th>
                        <th>@lang('global.users.fields.roles')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td></td>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles()->pluck('name') as $role)
                                        <span class="label label-info label-many">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.show',[$user->id]) }}"><i class="btn btn-warning btn-xs"> View</i></a>
                                    <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection