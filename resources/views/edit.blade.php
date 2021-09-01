@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
      margin-top: 5%;
    }
    .push-top {
      margin-top: 50px;
    }
    .btn-turq {
    background-color: #2bb79b;
    color: #f0f0f0;
    }
    .container * {
       margin: 5px;
    }
    .push-button-tobottom{
       margin-bottom: 15px;
    }

</style>

<div class="card push-top">
  <div class="card-header">
    Aanpassen en updaten
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('customers.update', $customer->id) }}">
         @csrf
         @method('PATCH')
          <div class="form-group">
              <label for="company">Bedrijf</label>
              <input type="text" class="form-control" name="company" value="{{ $customer->company }}"/>
          </div>
          <div class="form-group">
              <label for="last_name">Achternaam</label>
              <input type="text" class="form-control" name="last_name" value="{{ $customer->last_name }}"/>
          </div>
          <div class="form-group">
              <label for="first_name">Voornaam</label>
              <input type="text" class="form-control" name="first_name" value="{{ $customer->first_name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email_address" value="{{ $customer->email_address }}"/>
          </div>
          <div class="form-group push-button-tobottom">
              <label for="phone">Telefoon</label>
              <input type="text" class="form-control" name="business_phone" value="{{ $customer->business_phone }}"/>
          </div>
          <button type="submit" class="btn btn-turq btn-block">Opslaan</button>
      </form>
  </div>
</div>
@endsection

<!-- Combo edit en delete:
<div class="buttons text-center">
          <button type="submit" class="btn btn-turq"><i class="far fa-save"></i></button>
          <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
         </form>
         </div> -->