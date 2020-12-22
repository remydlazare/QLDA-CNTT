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
        <li class="active">Đăng Nhập</li>
      </ul>
       <!-- Account Login-->
      <div class="row">  
        <div class="col-lg-12">
          <h1 class="heading1"><span class="maintext">Đăng Nhập</span></h1>
          <section class="returncustomer">
            <h2 class="heading2">Đăng Nhập </h2>
            <div class="loginbox">
              <h4 class="heading4">Bạn đã có tài khoản. Vui lòng hãy đăng nhập:</h4>
              @if(Session::has('flash_message'))
                  <div class="alert alert-{!! Session::get('flash_level') !!}">
                      {!! Session::get('flash_message') !!}
                  </div>
              @endif
              @include('admin.blocks.error')
              <form class="form-vertical" role="form" action="" method="POST">
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
        

      </div>
    </div>
  </section>


@endsection