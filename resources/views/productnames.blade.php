
@extends('layout')

@section('title')
Lijst alle orders
@endsection

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }

  .btn-turq {
    background-color: #2bb79b;
    color: #f0f0f0;
  }

  tbody, tr:first-child {
    border: #262626 1px solid;
  }

  tr:hover {
    cursor: pointer;
  }

  .hidden {
    visibility: hidden;
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }

  tr:hover .hidden {
    visibility: visible;
    opacity: 1;
    transition: opacity 1s ease-in-out;
  }

  button {
    margin: 5px;
  }

</style>

<div class="push-top">
  @if(session()->get('ourMessage'))
    <div class="alert alert-success">
      {{ session()->get('ourMessage') }}  
    </div><br />
  @endif
  <table class="table table-striped my-5">
    <thead>
        <tr class="table-dark">
          <td>Product name</td>
        </tr>
    </thead>
    <tbody>
        @foreach($all_product_names as $name)
        <tr>
            <td>{{$name}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection