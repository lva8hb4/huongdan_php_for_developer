Select * from PhongBan;

#Tạo thủ tục lấy danh sách phòng ban
Delimiter $$
Create procedure SP_LayDanhSachPhongBan()
Begin
Select MaPhong, TenPhong from PhongBan;
End $$;
Delimiter $$;

#Tạo thủ tục thêm mới phòng ban
Delimiter $$
Create procedure SP_ThemPhongBan
(
ma varchar(10),
ten varchar(150)
)
Begin
Insert into PhongBan(MaPhong, TenPhong)
values(ma, ten);
End $$;
Delimiter $$;



