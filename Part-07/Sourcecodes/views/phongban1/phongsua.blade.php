<h1>Cập nhật phòng ban</h1>
<form action="/phongban1/sua/{{$phong->MaPhong}}" method="post">
<fieldset>
    <legend>Nhập thông tin phòng ban</legend>
    <table>
        <tr>
            <td>
                Mã phòng
            </td>  
            <td>
                <input type="text" name="maPhong" value="{{$phong->MaPhong}}" placehoder="Nhập mã nhân viên"/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            </td>  
        </tr>  
        <tr>
            <td>
                Tên phòng
            </td>  
            <td>
                <input type="text" name="tenPhong" value="{{$phong->TenPhong}}" placehoder="Nhập mã nhân viên"/>
            </td>  
        </tr>   
        <tr>
            <td>
               
            </td>  
            <td>
                <input type="submit" name="btnThemMoi" value="Cập nhật"/>
                <br>
                <?php

		if(isset($thongBao))
			{
				echo "<br>" . $thongBao . "<br>";
			}
		?>
		<br>
            </td>  
        </tr>     
    </table>    
</fieldset> 
</form>   