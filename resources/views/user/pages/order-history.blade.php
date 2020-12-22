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
        <li class="active">Tài Khoản</li>
      </ul>
      <div class="row">
        
        <!-- My Account-->
        <div class="col-lg-9">
            <h1 class="heading1"><span class="maintext">LỊCH SỬ ĐƠN HÀNG</span></h1>
            <div class="container col-md-6"   style="">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <th>Mã đơn hàng</th>
                  <th>Ngày đặt hàng</th>
                  <th>Trạng thái</th>
                  <th>Tổng</th>
                </thead>
                <tbody>
                  @foreach($orders as $item)
                  <tr>
                    <td>{!! $item->id !!} <a href="#" style="color: Blue; float: right;">Mô tả</a></td>
                    <td>{!! $item->date_order !!}</td>
                    <td>
                      @if($item->status == 0)
                        Đang chờ xử lý
                      @elseif($item->status == 1)
                        Chưa giao hàng
                      @elseif($item->status == 2)
                        Đang giao hàng
                      @elseif($item->status == 3)
                        Đã Giao Hàng
                      @endif
                    </td>
                    <td style="color: red;">{!! $item->total !!}đ</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
     
        </div>
        <!-- Sidebar Start-->
          <aside class="col-lg-3">
            <div class="sidewidt">
              <h2 class="heading2"><span>Tài Khoản</span></h2>
              <ul class="nav nav-list categories">
                @if(Auth::user()->level == 1)
                <li>
                  <a href="{!! url('admin/bill/list') !!}">Trang quản trị</a>
                </li>
                @endif
                <li>
                  <a href="{!! url('edit-account') !!}">Sửa tài khoản</a>
                </li>
                <li><a href="{!! url('order-history') !!}">Lịch sử mua hàng</a>
                </li>
                <li>
                  <a href=" {!! url('logout') !!}">Đăng Xuất</a>
                </li>
              </ul>
            </div>
          </aside>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
@endsection