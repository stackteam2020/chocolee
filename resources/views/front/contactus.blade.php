@extends('layouts.front')

@section('style')
@endsection

@section('content')
<div class="ps-page--contact">
      <div class="ps-hero bg--cover" data-background="img/hero/shop-hero.png">
        <div class="ps-hero__container">
          <div class="ps-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="index-2.html">Home</a></li>
              <li>Contact Us</li>
            </ul>
          </div>
          <h1 class="ps-hero__heading">Contact Us</h1>
        </div>
      </div>
      <div class="ps-section ps-contact">
        <div id="contact-map" data-address="17 Queen St, Southbank, Melbourne 10560, Australia" data-title="Funiture!" data-zoom="17"></div>
        <div class="container">
          <div class="ps-section__header">
            <p>Contact Info</p>
            <h3>No. 342 - London Oxford Street, <br> 012 United Kingdom.</h3>
          </div>
          <div class="ps-section__content">
            <div class="row">
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 ">
                <figure>
                  <figcaption>Call us</figcaption>
                  <p>Our store:  (032) 3453 456 445</p>
                  <p>Brand:  (032) 3454 342 222</p>
                </figure>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 ">
                <figure>
                  <figcaption>Email</figcaption>
                  <p>Our store:<a href="#"><span class="__cf_email__" data-cfemail="274e49414867444f4e4c42555e09494253">[email&#160;protected]</span></a></p>
                  <p>Support:<a href="#"><span class="__cf_email__" data-cfemail="b7e4c2c7c7d8c5c3f7d4dfdedcd2c5ce99d9d2c3">[email&#160;protected]</span></a></p>
                </figure>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 ">
                <figure>
                  <figcaption>Store At America</figcaption>
                  <p>16122 COLLINS VICTORIA 3000</p>
                  <p>T:   + 33 323 34522</p>
                  <p>E:<a href="#"><span class="__cf_email__" data-cfemail="422b2c242d022f2d2d2c362a272f276c2c2736">[email&#160;protected]</span></a></p>
                </figure>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 ">
                <figure>
                  <figcaption>Store At America</figcaption>
                  <p>16122 COLLINS VICTORIA 3000</p>
                  <p>T:   + 33 323 34522</p>
                  <p>E:<a href="#"><span class="__cf_email__" data-cfemail="e48d8a828ba4898b8b8a908c818981ca8a8190">[email&#160;protected]</span></a></p>
                </figure>
              </div>
            </div>
          </div>
          <form class="ps-form--contact" action="#" method="post">
            <div class="ps-form__header">
              <p>Contact</p>
              <h3>Get In touch with us</h3>
            </div>
            <div class="ps-form__content">
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="Your Name">
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="Your Email">
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="Phone">
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Your message here" rows="3"></textarea>
                  </div>
                </div>
              </div>
              <div class="ps-form__submit">
                <button class="ps-btn">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    @section('scripts')
    @endsection
    @endsection