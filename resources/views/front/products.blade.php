@extends('layouts.front')

@section('styles')

@endsection

@section('content')

    <!--include search-sidebar-->
    <div class="ps-hero ps-hero--shopping bg--cover" data-background="img/hero/shop-hero.png">
      <div class="ps-hero__container">
        <div class="ps-breadcrumb">
          <ul class="breadcrumb">
            <li><a href="index-2.html">Home</a></li>
            <li>Shop Page</li>
          </ul>
        </div>
        <h1 class="ps-hero__heading">Shop Products</h1>
      </div>
    </div>
    <div class="ps-page--shop">
      <div class="container-fluid">
        <div class="ps-shopping ps-shopping--fullwidth">
          <div class="ps-shopping__left">
            <aside class="widget widget_shop widget_categories">
              <h3 class="widget-title">Categories</h3>
              <ul>
                @foreach($categories as $category)
                    <li><a href='javascript:;' onclick='filter_products({{$category->id}});'>{{$category->name}}</a></li>
                @endforeach
              </ul>
            </aside>
           
          </div>
          <div class="ps-shopping__right">
            <div class="ps-shopping__top">
              <p>Show 1-12 of 35 result</p>
              <figure>
                <select class="ps-select" title="Default Sorting">
                  <option value="1">Default Sorting 1</option>
                  <option value="2">Default Sorting 2</option>
                  <option value="3">Default Sorting 3</option>
                </select><a href="#"><i class="fa fa-bars"></i></a><a class="active" href="#"><i class="fa fa-th"></i></a>
              </figure>
            </div>
            <div class="ps-product-box">
              <div class="row" id="ahmed">
              @foreach($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                  <div class="ps-product">
                    <div class="ps-product__thumbnail"><img class="product_image" src="{{asset('/uploadedImages/products/'.$product->image)}}" alt=""/><a class="ps-product__overlay" href="product-default.html"></a>
                    </div>
                    <div class="ps-product__content">
                      <div class="ps-product__desc"><a class="ps-product__title" href="product-default.html">{{$product->name}}</a>
                        <p>{{$product->category->name}}</p><span class="ps-product__price">${{$product->price}}</span>
                      </div>
                      <div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href="#">Add to cart</a>
                        <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-caret-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    @section('scripts')
    <script>
        function filter_products(category_id) {
            $.ajax({
                method: 'get',
                url: `/products/${category_id}/filter`,
                data: category_id,
            }).success(function(response) {
                console.log(response.data)
                $('#ahmed').empty()
                response.data.forEach((product) => {
                    $('#ahmed').append(`
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><img src="{{ asset('/uploadedImages/products/${product.image}') }}" alt=""/><a class="ps-product__overlay" href="product-default.html"></a>
                            </div>
                            <div class="ps-product__content">
                            <div class="ps-product__desc"><a class="ps-product__title" href="product-default.html">${product.name}</a>
                                <p>${product.name}</p><span class="ps-product__price">$${product.price}</span>
                            </div>
                            <div class="ps-product__shopping"><a class="ps-btn ps-product__add-to-cart" href="#">Add to cart</a>
                                <div class="ps-product__actions"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-random"></i></a></div>
                            </div>
                            </div>
                        </div>
                    </div>
                    `)
                })
            })
        }
    </script>

  <script src="{{ asset('js/addToCart.js') }}" defer></script>

   @endsection
   @endsection

  