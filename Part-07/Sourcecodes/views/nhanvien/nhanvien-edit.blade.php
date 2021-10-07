@extends('layouts.admin')
@section('title', 'Quản lý nhân viên')
@section('breadcrumb')
@parent
  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Sửa thông tin nhân viên</h1>
          <p>Nhập thông tin nhân viên cần thêm vào hệ thống</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">BookStore</li>
          <li class="breadcrumb-item active"><a href="/nhanvien/danhsach">Nhân viên</a></li>
        </ul>
      </div>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="/nhanvien/sua/{{$objNV->MaNV}}" method="post">  
            <div class="tile-body">
                <h3>Nhập thông tin nhân viên</h3>
                <div class="row form-group">
                    <label class="col-md-2">Mã NV:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="MaNV" value="{{$objNV->MaNV}}"/>
                         <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    </div>    
                </div> 
                <div class="row form-group">
                    <label class="col-md-2">Họ tên:</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="HoTen" value="{{$objNV->HoTen}}"/>
                    </div>    
                </div> 
                <div class="row form-group">
                    <label class="col-md-2">Điện thoại:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="DienThoai" value="{{$objNV->DienThoai}}"/>
                    </div> 
                    <label class="col-md-2">Email:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="Email" value="{{$objNV->Email}}"/>
                    </div>       
                </div> 
                <div class="row form-group">
                    <label class="col-md-2">Địa chỉ:</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="DiaChi" value="{{$objNV->DiaChi}}"/>
                    </div>    
                </div>          
 </div>
 <div class="tile-footer">
     <div class="row form-group">
     <label class="col-md-2"></label>
     <div class="col-md-10">
         <button type="submit" class="btn btn-primary">Cập nhật</button>
         &nbsp;
         <a href="/nhanvien/danhsach" class="btn btn-danger" title="Trở về danh sách nhân viên">Trở về</a>
         <br/>
        @if(isset($thongBao))
        {{$thongBao}}
        @endif
     </div>
     </div>
 </div>   
 <form> 
          </div>
        </div>
      </div>
@endsection                