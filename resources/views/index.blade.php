@extends('layout')

@section('title')
Lijst alle producten
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
          <td>ID</td>
          <td>Bedrijf</td>
          <td>Achternaam</td>
          <td>Voornaam</td>
          <td>Email</td>
          <td>Telefoon</td>
          <td class="text-center">Actie</td>
        </tr>
    </thead>
    <tbody>
        @foreach($customer as $customers)
        <tr>
            <td>{{$customers->id}}</td>
            <td>{{$customers->company}}</td>
            <td>{{$customers->last_name}}</td>
            <td>{{$customers->first_name}}</td>
            <td>{{$customers->email_address}}</td>
            <td>{{$customers->business_phone}}</td>
            <td class="text-center">
              <div class="d-inline-flex hidden">
                <button class="btn btn-turq btn-sm"><a href="{{ route('customers.edit', $customers->id)}}"><i class="far fa-edit"></i></a></button>
                <form action="{{ route('customers.destroy', $customers->id)}}" method="post">
                 @csrf
                 @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i></button>
                </form>
              </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection