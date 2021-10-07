@extends('layouts.admin')
@section('title', 'Quản lý nhân viên')
@section('breadcrumb')
@parent
  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Quản lý nhân viên</h1>
          <p>Danh sách thông tin về nhân viên trong hệ thống</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">BookStore</li>
          <li class="breadcrumb-item active"><a href="#">Nhân viên</a></li>
        </ul>
      </div>
@endsection
@section('content')

<div class="row">
        <div class="col-md-12">
             
          <div class="tile">
              <div class="tile-title-w-btn">
                 <h3 class="title">Danh sách nhân viên</h3>
                 <p>
                  <a href="/nhanvien/them-moi" title="Nhấn vào đây để vào thêm mới nhân viên" class="btn btn-primary">Thêm mới</a>
                 </p>
              </div>  
            <div class="tile-body">
                 
              <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
    <tr>
        <th>Mã NV</th>
        <th>Họ tên</th>
        <th>Điện thoại</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        @if(count($nhanViens) > 0)
        @foreach($nhanViens as $nv)
        <tr>
            <td>{{$nv->MaNV}}</td>
            <td>{{$nv->HoTen}}</td>
            <td>{{$nv->DienThoai}}</td>
            <td>{{$nv->Email}}</td>
            <td>{{$nv->DiaChi}}</td>
            <td><a href="/nhanvien/sua/{{$nv->MaNV}}">Sửa</a>
            &nbsp;
            <a onclick="confirm('Bạn có chắc chắn muốn xoá không ?');" href="/nhanvien/xoa/{{$nv->MaNV}}">Xoá</a>
        </td>
        </tr>    
        @endforeach
        @endif
    </tbody>     
</table>
</div>
          </div>
        </div>
      </div>
@endsection