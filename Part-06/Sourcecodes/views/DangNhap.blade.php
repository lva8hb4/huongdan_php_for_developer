<form action="doDangNhap" method="post">
<fieldset>
<legend>Nhập thông tin đăng nhập</legend>
<table>
    <tr>
        <td>Tên đăng nhập:
        </td>
        <td>
        <input type="text" name="tenDangNhap"/>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        </td>
    </tr>
     <tr>
        <td>Mật khẩu:
        </td>
        <td>
        <input type="password" name="matKhau"/>
        </td>
    </tr>
     <tr>
        <td>
        </td>
        <td>
        <input type="submit" name="btnDangNhap" value="Đăng nhập"/>
        </td>
    </tr>
</table>
</fieldset>
</form>