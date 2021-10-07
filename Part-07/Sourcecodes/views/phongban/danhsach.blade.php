<h1>Danh sách phòng ban</h1>
<div style="width:100%; text-align:right;">
    <a href="/phongban/themMoi">Thêm mới</a>
</div>    

<table border="1">
    <tr>
        <th>Mã phòng</th>
        <th>Tên phòng</th>
        <th></th>
    </tr>  
    <tbody>
    @if(count($phongBans) > 0)
    @foreach ($phongBans as $pb)
        <tr>
            <td>{{$pb->MaPhong}}</td>
            <td>{{$pb->TenPhong}}</td>
             <td><a href="/phongban/sua/{{$pb->MaPhong}}">Sửa</a>&nbsp;<a href="/phongban/xoa/{{$pb->MaPhong}}">Xoá</a></td>
        </tr>    
    @endforeach
    @endif 
    </tbody> 
</table>    