<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!--Khai báo sử dụng css trong Laravel-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/mystyle.css')}}"/>
    <!--Khai báo sử dụng bootstrap trong Laravel-->
    <script src="{{asset('js/app.js')}}"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet"/>
</head> 
<body>
    <p>
        <h1>Hệ thống sách trực tuyến</h1>
    </p>  
    <p style="height:30px; color:white; background-color:navy;"></p>
    <div style="width:100%;">
        <div style="width:200px;float:left;">
            @includeIf('layouts.menu_navi')
        </div>  
        <div style="width:auto;float:left;">
            <p>
                <a href="#" class="btn btn-primary">Thực hiện</a>
                @section('chude')
                <h2>Chủ đề</h2>
                @show
            </p>
            <p>
            @yield('noidung')
            </p>
        </div>      
    </div>      
</body>
</html>
