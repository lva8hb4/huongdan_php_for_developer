Select * from HoaDonBanCT;

#Thủ tục thêm mới đơn mua, hoá đơn bán chi tiết
#Tạo thủ tục thêm mới hoá đơn bán
Delimiter $$
Create procedure SP_ThemHoaDonBan
(
mahd varchar(10),
tenhd varchar(250),
ngayban date,
mota varchar(500)
)
Begin
Insert into HoaDonBan(MaHoaDon, TenHoaDon, NgayBan, MoTa)
values(mahd, tenhd, ngayban, mota);
End $$;
Delimiter $$;

#Thêm hoá đơn bán
call SP_ThemHoaDonBan('HD001','Mua iPhone 11 Plus','2020-03-08','');
call SP_ThemHoaDonBan('HD002','Mua iPhone 11','2020-05-09','');
call SP_ThemHoaDonBan('HD003','Mua iPhone 12','2020-05-15','');

#Tạo thủ tục thêm mới hoá đơn bán
Delimiter $$
Create procedure SP_ThemHoaDonBanCT
(
mahd varchar(10),
mahang varchar(10),
soluong int,
gia float
)
Begin
Insert into HoaDonBanCT(HoaDonId, HangHoaId, SoLuong, GiaBan)
values(mahd, mahang, soluong, gia);
End $$;
Delimiter $$;

#Thêm hoá đơn bán chi tiết
call SP_ThemHoaDonBanCT('HD001', 'IP10', 5, 12000000);
call SP_ThemHoaDonBanCT('HD001', 'IP11', 2, 18000000);
call SP_ThemHoaDonBanCT('HD001', 'IP12', 10, 30000000);

call SP_ThemHoaDonBanCT('HD002', 'IP11', 10, 18000000);

call SP_ThemHoaDonBanCT('HD003', 'IP12', 2, 28000000);
call SP_ThemHoaDonBanCT('HD003', 'IP11', 5, 18000000);

#Tạo hàm đếm số lượng hàng mua theo mã hàng
Delimiter $$
Create function TongSoHangMua(
ma varchar(10)
)
Returns int
BEGIN
#Khai báo biến
Declare tongSo int;
#Gán giá trị từ câu truy vấn
set tongSo = (Select sum(SoLuong) from 
HoaDonMuaCT where HangHoaId = ma);
#Trả về kết quả
return tongSo;
End $$;
Delimiter $$;

Select TongSoHangMua('IP10');
#Tạo hàm đếm số lượng hàng mua theo mã hàng
Delimiter $$
Create function TongSoHangBan(
ma varchar(10)
)
Returns int
BEGIN
#Khai báo biến
Declare tongSo int;
#Gán giá trị từ câu truy vấn
set tongSo = (Select sum(SoLuong) from 
HoaDonBanCT where HangHoaId = ma);
#Trả về kết quả
return tongSo;
End $$;
Delimiter $$;

Select TongSoHangBan('IP10');

#Viết câu lệnh hiển thị tồn kho theo từng mặt hàng
Create view vThongKeTonKho
as
Select MaHang, TenHang, TongSoHangMua(MaHang) as TongMua,
TongSoHangBan(MaHang) as TongBan,
TongSoHangMua(MaHang) - TongSoHangBan(MaHang) as TonKho 
from HangHoa;

Select * from vThongKeTonKho;



