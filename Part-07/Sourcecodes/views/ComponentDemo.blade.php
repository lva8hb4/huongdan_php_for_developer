@extends('layouts.template1')

@section('title', 'Sử dụng component trong Laravel')

@section('chude')
<h2>Sử dụng component trong Laravel
@endsection

@section('noidung')

<!--Sử dụng để hiển thị lỗi-->
@component('layouts.alert')
    @slot('class')
        alert-danger
    @endslot
    @slot('title')
        Thông báo lỗi
    @endslot
    @slot('message')
        Có lỗi xảy ra, bạn vui lòng kiểm tra lại thông tin
    @endslot
@endcomponent

<!--Sử dụng để hiển thị thành công-->
@component('layouts.alert')
    @slot('class')
        alert-success
    @endslot
    @slot('title')
        Thông báo
    @endslot
    @slot('message')
        Thực hiện công việc thành công
    @endslot
@endcomponent

<h3>Ngày tháng hiện tại là:</h3>

@datetime(Now())

@endsection