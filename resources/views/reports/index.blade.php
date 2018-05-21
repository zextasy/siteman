@extends('layouts.master')

@section('title', 'Reports')
@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Reports') ])

@stop

@section('contents')

<table>
    <thead class="th-color">
                    <tr class="text-white" >
                  <th style="line-height: 20px">Name</th>
                  <th style="line-height: 20px">Site Id</th>

                  <!-- Getting the form sturctures  -->
                  @foreach($struc_datas as $info)
                  <th style="line-height: 20px">{{$info->label}}</th>
                  @endforeach
                  <th style="line-height: 20px">Action</th>
                </tr>
              </thead>
    <tbody>
        <tr>
<td>hi...</td>
</tr>

<tr>
<td>General Site Information</td>
</tr>

<td ></td>
</tr>

<tr>
    <td ></td>
</tr>
<tr>
    <td >
        hello
    </td></tr>
    <tr>
    <td >Hola</td></tr>
    <td ></td>
<tr>
<!--
     Horizontal alignment
    <td align="right">Big title</td>

      Vertical alignment
    <td valign="middle">Bold cell</td>

     Rowspan
    <td rowspan="3">Bold cell</td>

    Colspan
    <td colspan="6">Italic cell</td>

     Width
    <td width="100">Cell with width of 100</td>

     Height
    <td height="100">Cell with height of 100</td> -->
    </tbody>


</table>

@stop