@extends('layouts.app')

@section('content')
<style>
    
    .container{
        margin: auto;
        width: 40%;
        height: 60%;
        max-width: 90%;
    }
    table, th, td {
    border:1px solid black;
    }
</style>

<div class="container">
    <br><br><table style="width:100%;background:white; height:30%;">
        <tr>
            <th style="padding: 15px;"> Welcome {{$user->name}}</th>
        </tr>
        <tr>
            <td style="padding: 15px;">YOUR ID   {{$user->email}}</td>
        </tr>
        <tr>
            <td style="padding: 15px;">Your BALANCE   {{$balance}} INR</td>
        </tr>
        
    </table>
           
</div>

@endsection