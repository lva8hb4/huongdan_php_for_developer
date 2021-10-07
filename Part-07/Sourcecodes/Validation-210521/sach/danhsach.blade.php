@extends('layouts.admin')
@section('title', 'Quản lý nhân viên')
@section('breadcrumb')
@parent
  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Quản lý thông tin sách</h1>
          <p>Danh sách thông tin về sách trong hệ thống</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">BookStore</li>
          <li class="breadcrumb-item active"><a href="#">Sách</a></li>
        </ul>
      </div>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
             
          <div class="tile">
              <div class="tile-title-w-btn">
                 <h3 class="title">Danh sách thông tin sách</h3>
                 <p>
                  <a href="/sach/sach-add" title="Nhấn vào đây để vào thêm mới sách" class="btn btn-primary">Thêm mới</a>
                 </p>
              </div>  
            <div class="tile-body">
                 
    <table class="table table-striped table-hover table-bordered" id="sampleTable">
    <thead>
    <tr>
        <th>
        Ảnh
        </th>
        <th>
        Id
        </th>
        <th>
        Tên sách
        </th>
        <th>
        Mô tả
        </th>
        <th>
        Giá
        </th>
        <th>
        Ngày tạo
        </th>
        <th>
        Tác giả
        </th>
        <th style="width:150px;">
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($sach as $s)
        <tr>
            <td><img class="img-thumbnail" src="/images/{{$s->AnhSach}}" width="100" height="100"/></td>
            <td>{{$s->SachId}}</td>
            <td>{{$s->TenSach}}</td>
            <td>{{$s->MoTa}}</td>
            <td>{{$s->GiaSach}}</td>
            <td>{{$s->NgayTao}}</td>
            <td>{{$s->TacGia}}</td>
            <td>
            <a class="btn btn-success" href="/sach/chi-tiet/{{$s->SachId}}">Sửa</a>
            &nbsp;
            <a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xoá thông tin này ?');" href="/sach/sach-xoa/{{$s->SachId}}">Xoá</a>
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