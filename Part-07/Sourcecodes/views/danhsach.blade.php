<table>
<tr>
    <th>Mã </th>
    <th>Tên</th>
    <th>Tuổi</th>
    <th>Địa chỉ</th>
</tr>

$foreach($nhanViens as $nv)
<tr>
    <td>{{$nv->maNV}}</td>
    <td>{{$nv->hoTen}}</td>
    <td>{{$nv->tuoi}}</td>
    <td>{{$nv->diaChi}}</td>
</tr>
$endforeach
</table>
{{$nhanViens}}