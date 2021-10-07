#Tạo thủ tục thêm mới quốc gia
Delimiter $$
Create procedure SP_ThemQuocGia
(
ma varchar(10),
ten varchar(100)
)
Begin
Insert into QuocGia(MaQuocGia, TenQuocGia)
values(ma, ten);
End $$;
Delimiter $$;

#Gọi thủ tục
call SP_ThemQuocGia('VN', 'Việt Nam');
call SP_ThemQuocGia('USA', 'Mỹ');
call SP_ThemQuocGia('NB', 'Nhật Bản');
call SP_ThemQuocGia('HQ', 'Hàn Quốc');
call SP_ThemQuocGia('TQ', 'Trung Quốc');
call SP_ThemQuocGia('TL', 'Thái Lan');
call SP_ThemQuocGia('AN', 'Anh');

#Tạo thủ tục thêm mới hàng hoá
Delimiter $$
Create procedure SP_ThemHangHoa
(
ma varchar(10),
ten varchar(250),
mota varchar(1000),
maqg varchar(10)
)
Begin
Insert into HangHoa(MaHang, TenHang, MoTa, XuatXuId)
values(ma, ten, mota, maqg);
End $$;
Delimiter $$;

#Gọi thêm hàng hoá
call SP_ThemHangHoa('IP10', 'IPhone 10', '', 'TQ');
call SP_ThemHangHoa('IP11', 'IPhone 11 Plus', '', 'TQ');
call SP_ThemHangHoa('IP12', 'IPhone 12 Max', '', 'TQ');
call SP_ThemHangHoa('MB1', 'Macbook Pro M1', '', 'TQ');

#Thủ tục thêm mới đơn mua, hoá đơn mua chi tiết
#Tạo thủ tục thêm mới hoá đơn mua
Delimiter $$
Create procedure SP_ThemHoaDonMua
(
mahd varchar(10),
tenhd varchar(250),
ngaymua date,
mota varchar(500)
)
Begin
Insert into HoaDonMua(MaHoaDon, TenHoaDon, NgayMua, MoTa)
values(mahd, tenhd, ngaymua, mota);
End $$;
Delimiter $$;

#Thêm hoá đơn mua
call SP_ThemHoaDonMua('HD001','Nhập iPhone các loại','2020-03-03','');
call SP_ThemHoaDonMua('HD002','Nhập iPhone 11','2020-05-03','');
call SP_ThemHoaDonMua('HD003','Nhập iPhone 12','2020-05-10','');

#Tạo thủ tục thêm mới hoá đơn mua
Delimiter $$
Create procedure SP_ThemHoaDonMuaCT
(
mahd varchar(10),
mahang varchar(10),
soluong int,
gia float
)
Begin
Insert into HoaDonMuaCT(HoaDonId, HangHoaId, SoLuong, GiaMua)
values(mahd, mahang, soluong, gia);
End $$;
Delimiter $$;

#Thêm hoá đơn mua chi tiết
call SP_ThemHoaDonMuaCT('HD001', 'IP10', 50, 10000000);
call SP_ThemHoaDonMuaCT('HD001', 'IP11', 20, 15000000);
call SP_ThemHoaDonMuaCT('HD001', 'IP12', 30, 25000000);

call SP_ThemHoaDonMuaCT('HD002', 'IP11', 100, 15000000);

call SP_ThemHoaDonMuaCT('HD003', 'IP12', 60, 25000000);
call SP_ThemHoaDonMuaCT('HD003', 'IP11', 10, 15000000);