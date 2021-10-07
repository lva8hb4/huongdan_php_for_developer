@extends('layouts.admin')
@section('title', 'Thêm mới nhân viên')
@section('breadcrumb')
@parent
  <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Thêm mới thông tin sách</h1>
          <p>Thêm thông tin về sách trong hệ thống</p>
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
                 <h3 class="title">Nhập thông tin sách</h3>
                 <p>
                 
                 </p>
              </div>  
            <div class="tile-body">

<form method="post" action="/sach/themSach" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-2">
Tên sách:
</label>
<div class="col-md-10">
<input type="hidden" name="_token" value="{{csrf_token()}}"/>

 <input type="text" name="TenSach" class="form-control"/>
 </div>
</div>
<div class="row form-group">
    <label class="col-md-2">
    Mô tả:
    </label>
    <div class="col-md-10">
        <textarea rows="5" name="MoTa" class="form-control">
        </textarea>
    </div>
</div>
<div class="row form-group">
    <label class="col-md-2">
    Ảnh:
    </label>
    <div class="col-md-4">
        <input type="file" name="fUpload" class="form-control"/>
    </div>
</div>
<div class="row form-group">
    <label class="col-md-2">
    Giá sách:
    </label>
    <div class="col-md-4">

 <input type="text" name="GiaSach" class="form-control"/>
    </div>
    <label class="col-md-2">
    Tác giả: 
    </label>
    <div class="col-md-4">
    <input type="text" name="TacGia" class="form-control"/>
    </div>
</div>
<div class="row form-group">
                    <label class="col-md-2">Chủ đề:</label>
                    <div class="col-md-4">
                       <select name="cboChuDe" class="form-control">
                           <option value="">--Chọn chủ đề--</option>
                           @if(isset($chuDes))
                           @foreach($chuDes as $cd)
                            <option value="{{$cd->MaChuDe}}">{{$cd->TenChuDe}}</option>
                           @endforeach
                           @endif
                       </select>    
                    </div>    
 </div>   
<div class="row form-group">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
<input type="submit" name="btnThemMoi" value="Thêm mới" class="btn btn-primary"/>
&nbsp;
<a href="/sach/danhsach" class="btn btn-danger">Trở lại</a>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
    <br>
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@if(session('message'))
 <div class="alert alert-danger">
{{session('message')}}
</div>
@endif
    </div>
</div>

</form>

</div>
</div>
</div>
</div>
@endsection