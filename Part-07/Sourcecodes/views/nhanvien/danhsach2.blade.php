@extends('layouts.admin')
@section('title', 'Quản lý nhân viên 2')
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
                  <a href="/nhanvien-add" title="Nhấn vào đây để vào thêm mới nhân viên" class="btn btn-primary">Thêm mới</a>
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
    </tr>
    </thead>
    <tbody>
@foreach($nhanViens as $nv)
    <tr>
    <td>
       {{$nv->maNV}}
     </td>
     <td>
       {{$nv->hoTen}}
     </td>
     <td>
       {{$nv->dienThoai}}
     </td>
      <td>
       {{$nv->email}}
     </td>
      <td>
       {{$nv->diaChi}}
     </td>
    </tr>
    
@endforeach
 </tbody>
</table>
</div>
          </div>
        </div>
      </div>
@endsection