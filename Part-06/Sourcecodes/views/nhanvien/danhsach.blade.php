<h2>Danh sách nhân viên</h2>
<div style="width:100%; text-align:right">
    <a href="nhanvien-add">Thêm mới</a>
</div>
<table border="1">
    <tr>
        <th>Mã NV</th>
        <th>Họ tên</th>
        <th>Tuổi</th>
        <th>Địa chỉ</th>
    </tr>
@foreach($nhanViens as $keys=>$values)
    <tr>
    @foreach($values as $k=>$v)
    <td>
       {{$v}}
     </td>
    @endforeach
    </tr>
@endforeach
</table>