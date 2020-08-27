@extends('layouts.front')

@section('styles')

@endsection

@section('content')
<div class="ps-page">
      <div class="ps-hero bg--cover" data-background="img/hero/shop-hero.png">
        <div class="ps-hero__container">
          <div class="ps-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="index-2.html">Home</a></li>
              <li>Whishlist</li>
            </ul>
          </div>
          <h1 class="ps-hero__heading">Whishlist</h1>
        </div>
      </div>
      <div class="container">
        <div class="ps-shopping-cart">
          <div class="table-responsive">
            <table class="table ps-table ps-table--shopping-cart">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Unit Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="table-body">
                <tr>
                  
                </tr>
              </tbody>
            </table>
          </div>
         
          <div class="ps-section__footer">
          <div class="ps-checkout">
          <div class="ps-checkout__left">
           
            
          </div>
          
        </div>
            
          </div>
        </div>
      </div>
    </div>   

@endsection
    
@section('scripts')
  <script src="{{ asset('/js/checkout.js') }}" defer></script>
@endsection
 