@extends('user.master')
@section('content')
@section('description','Shop Fashion ST')

  <!-- Slider Start-->
  @include('user.blocks.slider')
  <!-- Slider End-->
  
  <!-- Section Start-->
  @include('user.blocks.otherdetail')
  <!-- Section End-->

<!-- Featured Product-->
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">SẢN PHẨM NỔI BẬT</span><span class="subtext"> Xem các sản phẩm nổi bật nhất của chúng tôi</span></h1>
    <ul class="thumbnails">
      @foreach($product as $item)
      <li class="col-lg-3  col-sm-6">
        <a class="prdocutname" href="{!! url('product-detail',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
        <div class="thumbnail">
          @if($item->price_new != 0)
          <span class="sale tooltip-test">Sale</span>
          @endif
          <a href="{!! url('product-detail',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
<!--           <div class="shortlinks">
            <a class="details" href="#">DETAILS</a>
            <a class="wishlist" href="#">WISHLIST</a>
            <a class="compare" href="#">COMPARE</a>
          </div> -->
          <div class="pricetag">
            @if($item->status == 0)
              <span class="spiral"></span><a href="{!! url('product-detail',[$item->id,$item->alias]) !!}" class="productcart">Mua Ngay</a>
            @else
              <span class="spiral"></span><a href="{!! url('add-to-cart',[$item->id,$item->alias]) !!}" class="productcart">Mua Ngay</a>
            @endif
            <div class="price">
              @if($item->price_new == 0)
                <div class="pricenew">{!! $item->price !!}đ</div>
              @else
                <div class="pricenew">{!! $item->price_new !!}đ</div>
                <div class="priceold">{!! $item->price !!}đ</div>
              @endif
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">SẢN PHẨM MỚI NHẤT</span><span class="subtext">Xem các sản phẩm mới nhất của chúng tôi</span></h1>
    <ul class="thumbnails">
      @foreach($product as $item)
      <li class="col-lg-3 col-sm-6">
        <a class="prdocutname" href="{!! url('product-detail',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
        <div class="thumbnail">
          @if($item->price_new != 0)
          <span class="sale tooltip-test">Sale</span>
          @endif
          <a href="{!! url('product-detail',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
<!--           <div class="shortlinks">
            <a class="details" href="#">DETAILS</a>
            <a class="wishlist" href="#">WISHLIST</a>
            <a class="compare" href="#">COMPARE</a>
          </div> -->
          <div class="pricetag">
            @if($item->status == 0)
              <span class="spiral"></span><a href="{!! url('product-detail',[$item->id,$item->alias]) !!}" class="productcart">Mua Ngay</a>
            @else
              <span class="spiral"></span><a href="{!! url('add-to-cart',[$item->id,$item->alias]) !!}" class="productcart">Mua Ngay</a>
            @endif
            <div class="price">
              @if($item->price_new == 0)
                <div class="pricenew">{!! $item->price !!}đ</div>
              @else
                <div class="pricenew">{!! $item->price_new !!}đ</div>
                <div class="priceold">{!! $item->price !!}đ</div>
              @endif
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>
@endsection