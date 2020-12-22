@extends('user.master')
@section('content')
@section('description','Shop Fashion ST')



<section id="product">
  <div class="container">
   <!--  breadcrumb -->  
    <ul class="breadcrumb">
      <li>
        <a href="#">Trang Chủ</a>
        <span class="divider">/</span>
      </li>
      <li class="active">Danh Mục</li>
    </ul>
    <div class="row">        
      <!-- Sidebar Start-->
      <aside class="col-lg-3">

       <!--  Best Seller -->  
        <div class="sidewidt">
          <h2 class="heading2"><span>SẢN PHẨM BÁN CHẠY NHẤT</span></h2>
          <ul class="bestseller">
            @foreach($product_bestseller as $item_product_bsl)
            <?php
                $bsl = DB::table('products')->join('categories', 'categories.id', '=', 'products.cate_id')
                            ->select('products.*', 'categories.id as cate_id', 'categories.name as cate_name')
                            ->where('products.id',$item_product_bsl->product_id)
                            ->first();
            ?>
            <li>
              <img width="50" height="50" src="{!! asset('resources/upload/'.$bsl->image) !!}" alt="product" title="product">
              <a class="productname" href="{!! url('product-detail',[$bsl->id,$bsl->alias]) !!}"> {!! $bsl->name !!}</a>
              <span class="procategory"> {!! $bsl->cate_name !!}</span>
              <span class="price">
                @if($bsl->price_new == 0)
                  {!! $bsl->price !!}đ
                @else
                  {!! $bsl->price_new !!}đ
                @endif
              </span>
            </li>
            @endforeach
          </ul>
        </div>
        <!-- Latest Product -->  
        <div class="sidewidt">
          <h2 class="heading2"><span>SẢN PHẨM MỚI NHẤT</span></h2>
          <ul class="bestseller">
            @foreach($product_related as $item_product_related)
            <li>
              <img width="50" height="50" src="{!! asset('resources/upload/'.$item_product_related->image) !!}" alt="product" title="product">
              <a class="productname" href="{!! url('product-detail',[$item_product_related->id,$item_product_related->alias]) !!}">{!! $item_product_related->name !!}</a>
              <span class="procategory">{!! $item_product_related->cate_name !!}</span>
              <span class="price">
                @if($item_product_related->price_new == 0)
                  {!! $item_product_related->price !!}đ
                @else
                  {!! $item_product_related->price_new !!}đ
                @endif
              </span>
            </li>
            @endforeach
          </ul>
        </div>

      </aside>
      <!-- Sidebar End-->
      <!-- Category-->
      <div class="col-lg-9">          
        <!-- Category Products-->
        <section id="category">
             <!-- Sorting-->
             <h3 style="color: red;">Kết quả tìm kiếm của: {!! $key_search !!}</h3>
              <div class="sorting well">
                <form class=" form-inline pull-left">
                  Sắp xếp theo :
                  <select>
                    <option>Mặc Định</option>
                    <option>Tên</option>
                    <option>Giá</option>
                    <option>Lượt đánh giá </option>
                    <option>Màu sắc</option>
                  </select>
                  &nbsp;&nbsp;
                  Hiển thị:
                  <select>
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                    <option>25</option>
                    <option>30</option>
                  </select>
                </form>
                <div class="btn-group pull-right">
                  <button class="btn" id="list"><i class="icon-th-list"></i>
                  </button>
                  <button class="btn btn-orange" id="grid"><i class="icon-th icon-white"></i></button>
                </div>
              </div>
             <!-- Category-->
              <section id="categorygrid">
                <ul class="thumbnails grid">
                  @foreach($product_search as $product_search)
                  <li class="col-lg-4 col-sm-6">
                    <a class="prdocutname" href="{!! url('product-detail',[$product_search['id'],$product_search['alias']]) !!}">{!! $product_search->name !!}</a>
                    <div class="thumbnail">
                      @if($product_search['price_new'] != 0)
                      <span class="sale tooltip-test">Sale</span>
                      @endif
                      <a href="{!! url('product-detail',[$product_search['id'],$product_search['alias']]) !!}"><img alt="" src="{!! asset('resources/upload/'.$product_search->image) !!}"></a>
                      <div class="pricetag">
                        @if($product_search->status == 0)
                          <span class="spiral"></span><a href="{!! url('product-detail',[$product_search->id,$product_search->alias]) !!}" class="productcart">Mua Ngay</a>
                        @else
                          <span class="spiral"></span><a href="{!! url('add-to-cart',[$product_search->id,$product_search->alias]) !!}" class="productcart">Mua Ngay</a>
                        @endif
                        <div class="price">
                          @if($product_search['price_new'] == 0)
                            <div class="pricenew">{!! $product_search->price !!}đ</div>
                          @else
                            <div class="pricenew">{!! $product_search->price_new !!}đ</div>
                            <div class="priceold">{!! $product_search->price !!}đ</div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
                <ul class="thumbnails list row">
                  @foreach($product_search as $product_search)
                  <li>
                    <div class="thumbnail">
                      <div class="row">
                        <div class="col-lg-4 col-sm-4">
                          @if($product_search['price_new'] != 0)
                            <span class="sale tooltip-test"> Sale</span>
                          @endif
                          <a href="{!! url('product-detail',[$product_search['id'],$product_search['alias']]) !!}"><img alt="" src="{!! asset('resources/upload/'.$product_search['image']) !!}"></a>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                          <a class="prdocutname" href="product.html">{!! $product_search['name'] !!}</a>
                          <div class="productdiscrption">{!! $product_search['intro'] !!}</div>
                          <div class="pricetag">
                            <span class="spiral"></span><a href="{!! url('add-to-cart',[$product_search['id'],$product_search['alias']]) !!}" class="productcart">Mua Ngay</a>
                            <div class="price">
                              @if($product_search['price_new'] == 0)
                                <div class="pricenew">{!! $product_search['price'] !!}đ</div>
                              @else
                                <div class="pricenew">{!! $product_search['price_new'] !!}đ</div>
                                <div class="priceold">{!! $product_search['price'] !!}đ</div>
                              @endif
                            </div>
                          </div>
<!--                           <div class="shortlinks">
                            <a class="details" href="#">DETAILS</a>
                            <a class="wishlist" href="#">WISHLIST</a>
                            <a class="compare" href="#">COMPARE</a>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </section>
        </section>
      </div>
    </div>
  </div>
</section>

@endsection