@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
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
<link href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
<h2>Statement Of Accounts</h2>

<table id="statment_table" class="table data-table" style="width:100%;background:white; height:30%;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>DATE TIME</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Details</th>
                            <th>balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statements as $statement)
                       

                        
                        <tr>
                            </td>
                            <td></td>
                            <td >{{ $statement->created_at }}</td>
                            <td>{{ $statement->amount }}</td>
                            <td>{{ $statement->type }}</td>
                            <td>{{$statement->details }}</td>
                            <td>{{ $statement->balance }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

           
</div>

@endsection
@section('js-script')
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>$(document)
  .ready(function () {
    $('#statment_table')
      .DataTable();
  });
  </script>
@endsection
</body>
</html>