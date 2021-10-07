<h1>Thêm mới phòng ban</h1>
<form action="/phongban3/them-moi" method="post">
<fieldset>
    <legend>Nhập thông tin phòng ban</legend>
    <table>
        <tr>
            <td>
                Mã phòng
            </td>  
            <td>
                <input type="text" name="maPhong" placehoder="Nhập mã nhân viên"/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            </td>  
        </tr>  
        <tr>
            <td>
                Tên phòng
            </td>  
            <td>
                <input type="text" name="tenPhong" placehoder="Nhập mã nhân viên"/>
            </td>  
        </tr>   
        <tr>
            <td>
               
            </td>  
            <td>
                <input type="submit" name="btnThemMoi" value="Thêm mới"/>
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