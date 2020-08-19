@extends('layouts.app')

@section('styles')
@endsection

@section('content')

        <header class="main-header">
            <nav class="main-nav nav">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="store.html">STORE</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                </ul>
            </nav>
            <h1 class="band-name band-name-large">The Generics</h1>
        </header>
        <section class="container content-section">
            <h2 class="section-header">MUSIC</h2>
            <div class="shop-items">
                
               
                
                
            </div>
        </section>
        <section class="container content-section">
            <h2 class="section-header">MERCH</h2>
            @foreach($products as $product)
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">{{ $product->name }}</span>
                    <img class="shop-item-image" src="{{ asset('uploadedImages/products/'.$product->image) }}">
                    <div class="shop-item-details">
                        <span class="shop-item-price">${{$product->price}}</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
    
            </div>
            @endforeach
        </section>
        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
               
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">$0</span>
            </div>
            <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
        </section>
        <footer class="main-footer">
            <div class="container main-footer-container">
                <h3 class="band-name">The Generics</h3>
                <ul class="nav footer-nav">
                    <li>
                        <a href="https://www.youtube.com" target="_blank">
                            <img src="Images/YouTube Logo.png">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.spotify.com" target="_blank">
                            <img src="Images/Spotify Logo.png">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="Images/Facebook Logo.png">
                        </a>
                    </li>
                </ul>
            </div>

@section('scripts')
<script src="{{ asset('js/cart.js') }}" defer></script>
@endsection  
   
@endsection