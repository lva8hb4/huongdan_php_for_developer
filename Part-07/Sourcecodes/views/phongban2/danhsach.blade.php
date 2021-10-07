<h1>Danh sách phòng ban</h1>
<div style="width:100%; text-align:right;">
    <a href="/phongban2/them-moi">Thêm mới</a>
</div>
<table border="1">
    <tr>
        <th>Mã phòng</th>
        <th>Tên phòng</th>
        <th></th>
    </tr> 
    <tbody>
        @if(count($phongBans) > 0)
        @foreach($phongBans as $pb)
        <tr>
            <td>{{$pb->MaPhong}}</td>
            <td>{{$pb->TenPhong}}</td>
            <td><a href="/phongban2/sua/{{$pb->MaPhong}}">Sửa</a>
            &nbsp;
            <a onclick="confirm('Bạn có chắc chắn muốn xoá không ?');" href="/phongban2/xoa/{{$pb->MaPhong}}">Xoá</a>
        </td>
        </tr>    
        @endforeach
        @endif
    </tbody>       
</table>        