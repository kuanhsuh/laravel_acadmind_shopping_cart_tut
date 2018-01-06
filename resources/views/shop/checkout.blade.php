@extends('layouts.master')
@section('title')
  Laravel Shopping Cart
@endsection

@section('content')
<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
    <h1>Checkout</h1>
    <h4>Your Total: ${{$total}}</h4>
    <form action="{{route('checkout')}}" method="post" id="checkout-form">
      <div class="row">
        <div class="col-xs-12">
          <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" id="name" class="form-control" required>
          </div>
        </div> <!-- col -->
        <div class="col-xs-12">
          <div class="form-group">
            <label for="address">Address</label>
            <input name="address" type="text" id="address" class="form-control" required>
          </div>
        </div> <!-- col -->
        <div class="form-row">
            <label for="card-element">
              Credit or debit card
            </label>
            <div id="card-element">
              <!-- a Stripe Element will be inserted here. -->
            </div>
            <!-- Used to display Element errors -->
            <div id="card-errors" role="alert"></div>
        </div>
        {{--  <div class="col-xs-12">
          <div class="form-group">
            <label for="card-name">Card Holder Name</label>
            <input type="text" id="card-name" class="form-control" required>
          </div>
        </div> <!-- col -->
        <div class="col-xs-12">
          <div class="form-group">
            <label for="card-number">Card Number</label>
            <input type="text" id="card-number" class="form-control" required>
          </div>
        </div> <!-- col -->
        <div class="col-xs-6">
          <div class="form-group">
            <label for="card-expiry-month">Expiration Month</label>
            <input type="text" id="card-expiry-month" class="form-control" required>
          </div>
        </div> <!-- col -->
        <div class="col-xs-6">
          <div class="form-group">
            <label for="card-expiry-year">Expiration Year</label>
            <input type="text" id="card-expiry-year" class="form-control" required>
          </div>
        </div> <!-- col -->  --}}
        {{--  <div class="col-xs-12">
          <div class="form-group">
            <label for="card-cvc">CVC</label>
            <input type="text" id="card-cvc" class="form-control" required>
          </div>
        </div> <!-- col -->  --}}
      </div>
      {{ csrf_field() }}
      <button type="submit" class="btn btn-success">Buy Now</button>
    </form>
  </div>
</div>

@endsection

@section('scripts')
  <script src="https://js.stripe.com/v3/"></script>
  <script src="{{ asset('js/checkout.js') }}"></script>
@endsection