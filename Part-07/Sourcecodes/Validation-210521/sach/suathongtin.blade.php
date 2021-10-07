@extends('layouts.admin')
@section('title', 'Sửa thông tin sách')
@section('breadcrumb')
@parent
  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Sửa thông tin sách</h1>
          <p>Sửa thông tin về sách trong hệ thống</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">BookStore</li>
          <li class="breadcrumb-item active"><a href="/sach/danhsach">Sách</a></li>
        </ul>
      </div>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
             
          <div class="tile">
              <div class="tile-title-w-btn">
                 <h3 class="title">Nhập thông tin sách</h3>
                 <p>
                 
                 </p>
              </div>  
            <div class="tile-body">
<form method="post" action="/sach/suaSach/{{$sach->SachId}}" enctype="multipart/form-data">
<div class="row form-group">
<label class="col-md-2">
Tên sách:
</label>
<div class="col-md-10">
<input type="hidden" name="_token" value="<?php echo csrf_token()?>"/>

 <input type="text" name="TenSach" value="{{$sach->TenSach}}" class="form-control"/>
 </div>
</div>
<div class="row form-group">
    <label class="col-md-2">
    Mô tả:
    </label>
    <div class="col-md-10">
        <textarea rows="5" name="MoTa" class="form-control">
          {{$sach->MoTa}}
        </textarea>
    </div>
</div>
<div class="row form-group">
    <label class="col-md-2">
    Ảnh:
    </label>
    <div class="col-md-4">
        <input type="file" name="fUpload" class="form-control"/>
        <img src="/images/{{$sach->AnhSach}}" width="150" height="150"/>
    </div>
</div>
<div class="row form-group">
    <label class="col-md-2">
    Giá sách:
    </label>
    <div class="col-md-4">

 <input type="text" name="GiaSach" value="{{$sach->GiaSach}}" class="form-control"/>
    </div>
    <label class="col-md-2">
    Tác giả: 
    </label>
    <div class="col-md-4">
    <input type="text" name="TacGia" value="{{$sach->TacGia}}" class="form-control"/>
    </div>
</div>
<div class="row form-group">
                    <label class="col-md-2">Chủ đề:</label>
                    <div class="col-md-4">
                       <select name="cboChuDe" class="form-control">
                           <option value="">--Chọn chủ đề--</option>
                           @if(isset($chuDes))
                           @foreach($chuDes as $cd)
                             
                            @if($sach->MaChuDe == $cd->MaChuDe)
                            <option selected="selected" value="{{$cd->MaChuDe}}">{{$cd->TenChuDe}}</option>
                            @else
                            <option value="{{$cd->MaChuDe}}">{{$cd->TenChuDe}}</option>
                            @endif
                           @endforeach
                           @endif
                       </select>    
                    </div>    
 </div>  
<div class="row form-group">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
<input type="submit" name="btnCapNhat" value="Cập nhật" class="btn btn-primary"/>
&nbsp;
<a href="/sach/danhsach" class="btn btn-danger">Trở lại</a>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection