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
      <li class="active">Thanh Toán</li>
    </ul>
    <div class="row">        
      <!-- Account Login-->
      <div class="col-lg-12">
        @if(!Auth::check())
        <h1 class="heading1"><span class="maintext">Thanh Toán</span><span class="subtext"> Quy trình thanh toán</span></h1>
        <div class="checkoutsteptitle">Khách Hàng<a class="modify">Sửa</a>
        </div>
        <div class="checkoutstep ">

          <section class="returncustomer">
            <h2 class="heading2">Đăng Nhập</h2>
            <div class="loginbox">
              <h4 class="heading4">Bạn đã có tài khoản. Vui lòng hãy đăng nhập:</h4>
              @if(Session::has('flash_message'))
                  <div class="alert alert-{!! Session::get('flash_level') !!}">
                      {!! Session::get('flash_message') !!}
                  </div>
              @endif
              @include('admin.blocks.error')
              <form class="form-vertical" role="form" action="{!! url('login-checkout') !!}" method="POST">
                 <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                  <div class="control-group">
                    <label  class="control-label">Tài Khoản:</label>
                    <div class="controls">
                      <input type="text" name="txtUsername" placeholder="tài khoản" class="" value="{!! old('txtUsername') !!}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label  class="control-label">Mật Khẩu:</label>
                    <div class="controls">
                      <input type="password" name="txtPass" placeholder="mật khẩu" class="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="checkbox" name="remember" value="true">Nhớ tài khoản
                    <br>
                    <a class="" href="#">Quên Mật Khẩu?</a>
                  </div>
                  
                  <button type="submit" class="btn btn-orange">Đăng Nhập</button>
                </fieldset>
              </form>
            </div>
          </section>
          <section class="newcustomer">
            <h2 class="heading2">Khách Hàng Mới</h2>
            <div class="loginbox">
              <h4 class="heading4">Đăng Ký Tài khoản</h4>
              <p>Đăng ký tại Shop Fashion ST để sử dụng các chức năng trên website và cập nhật thông tin các sản phẩm mới của chúng tôi một cách nhanh nhất.</p>
              <br>
              <br>
              <a href="{!! url('register') !!}" class="btn btn-orange">Đăng Ký</a>
            </div>
          </section>

        </div>
        @endif
        <form class="form-vertical" role="form" action="{!! url('checkout') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        @if(!Auth::check())
        <div class="checkoutsteptitle">Thông tin khách hàng<a class="modify">Sửa</a>
        </div>
        <div class="checkoutstep">
          <div class="row">
              <fieldset>
                <div class="col-lg-6">
                  <div class="control-group">
                    <label class="control-label" >Tên Đầy đủ<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtFname" class=""  value="{!! old('txtFname') !!}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" >E-Mail<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtEmail" class=""  value="{!! old('txtEmail') !!}">
                    </div>
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="control-group">
                    <label class="control-label" >Số điện thoại<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtPhone" class=""  value="{!! old('txtPhone') !!}">
                    </div>
                  </div>
    
                  <div class="control-group">
                    <label class="control-label" >Địa chỉ<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtAddress" class=""  value="{!! old('txtAddress') !!}">
                    </div>
                  </div>
              </fieldset>
          </div>
        </div>


        @endif

        <div class="checkoutsteptitle">Phương thức thanh toán<a class="modify">Sửa</a>
        </div>
        
          <div class="checkoutstep">
            <p>Vui lòng chọn phương thức thanh toán</p>
            <label class="inline">
              <input name="payment" type="radio" checked="checked" value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</label>
            <textarea name="note" rows="2" placeholder="Ghi chú..."></textarea>
            <br>

          </div>
          <div class="col-lg-4 pull-right">
            <input type="submit" class="btn btn-orange pull-right" value="Thanh Toán">
            <a href="{!! url('index') !!}"><input type="" value="Tiếp tục mua hàng" class="btn btn-orange pull-right mr10"></a>
          </div>  
        </form>
      </div>        
    </div>
  </div>
</section>

@endsection