
@extends('layouts.template1')
@section('title', 'Trang chủ - BookOnline')
@section('chude')
<h3>Sản phẩm nhiều người mua</h3>
@endsection
@section('noidung')
<h2>{{isset($tenDangNhap) ? $tenDangNhap : "Chưa có"}}
</h2>
Giá trị lấy được từ share là: {{$domain}}
<h4>{{$email}}</h4>
<ul>
@for($i = 1; $i<=10; $i++)
    @if ($i==10)
    <li><b>{{$i}}</b></li>
    @else
    <li>{{$i}}</li>
    @endif
@endfor
</ul>
@endsection
