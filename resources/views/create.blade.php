@extends('layout')

@section('title')
Voeg nieuwe klant
@endsection

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Voeg nieuwe klant toe
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
      <form method="post" action="{{ route('customers.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Bedrijf</label>
              <input type="text" class="form-control" name="company"/>
          </div>
          <div class="form-group">
              <label for="description">Achternaam</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>
          <div class="form-group">
              <label for="genre">Voornaam</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>
          <div class="form-group">
              <label for="category">Email</label>
              <input type="text" class="form-control" name="email_address"/>
          </div>
          <div class="form-group">
              <label for="price">Telefoon</label>
              <input type="text" class="form-control" name="business_phone"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Maak nieuwe klant aan</button>
      </form>
  </div>
</div>
@endsection