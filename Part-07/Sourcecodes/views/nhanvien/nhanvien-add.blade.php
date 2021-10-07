@extends('layouts.admin')
@section('title', 'Quản lý nhân viên')
@section('breadcrumb')
@parent
  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Thêm mới nhân viên</h1>
          <p>Nhập thông tin nhân viên cần thêm vào hệ thống</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">BookStore</li>
          <li class="breadcrumb-item active"><a href="/danhsachnv1">Nhân viên</a></li>
        </ul>
      </div>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="/nhanvien/them-moi" method="post">  
            <div class="tile-body">
                <h3>Nhập thông tin nhân viên</h3>
                <div class="row form-group">
                    <label class="col-md-2">Mã NV:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="MaNV"/>
                         <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    </div>    
                </div> 
                <div class="row form-group">
                    <label class="col-md-2">Họ tên:</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="HoTen"/>
                    </div>    
                </div> 
                <div class="row form-group">
                    <label class="col-md-2">Điện thoại:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="DienThoai"/>
                    </div> 
                    <label class="col-md-2">Email:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="Email"/>
                    </div>       
                </div> 
                <div class="row form-group">
                    <label class="col-md-2">Địa chỉ:</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="DiaChi"/>
                    </div>    
                </div>  
                 <div class="row form-group">
                    <label class="col-md-2">Phòng ban:</label>
                    <div class="col-md-4">
                       <select name="cboPhong" class="form-control">
                           <option value="">--Chọn phòng--</option>
                           @if(isset($phongBans))
                           @foreach($phongBans as $pb)
                            <option value="{{$pb->MaPhong}}">{{$pb->TenPhong}}</option>
                           @endforeach
                           @endif
                       </select>    
                    </div>    
                </div>               
 </div>
 <div class="tile-footer">
     <div class="row form-group">
     <label class="col-md-2"></label>
     <div class="col-md-10">
         <button type="submit" class="btn btn-primary">Thêm mới</button>
         &nbsp;
         <a href="/nhanvien/danhsach" class="btn btn-danger" title="Trở về danh sách nhân viên">Trở về</a>
     </div>
     </div>
 </div>   
 <form> 
          </div>
        </div>
      </div>
@endsection                