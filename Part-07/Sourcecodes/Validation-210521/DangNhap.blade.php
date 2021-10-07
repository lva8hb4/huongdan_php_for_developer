<form action="doDangNhap2" method="post">
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
    <tr>
        <td></td>
        <td>
            @if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
    @endif
        </td>
    </tr>
</table>
</fieldset>
</form>