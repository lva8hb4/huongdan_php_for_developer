Select * from NhanVien;
#Hiển thị danh sách nhân viên thuộc phòng Kinh doanh hoặc có lương lớn hơn 10
#triệu
Select MaNV, HoTen, DienThoai, Email, DiaChi, 
Round((hs.HeSo*3500000+hs.PhuCap),1)
 as TongLuong from NhanVien nv inner join HeSoLuong hs on nv.heSo = hs.Id
where MaPhong='KD' OR (hs.HeSo*3500000+hs.PhuCap)> 10000000;
#Lấy những nhân viên có họ là Nguyễn, thuộc phòng Công nghệ thông tin 
#và có lương lớn hơn 10 triệu
Select MaNV, HoTen, DienThoai, Email, DiaChi, 
Round((hs.HeSo*3500000+hs.PhuCap),1)
 as TongLuong from NhanVien nv inner join HeSoLuong hs on nv.heSo = hs.Id
where HoTen like 'Nguyễn%' and MaPhong='CNTT' AND 
(hs.HeSo*3500000+hs.PhuCap)> 10000000;
#Hiển thị số lượng nhân viên có trong công ty
Select count(*) as SoLuongNV from NhanVien;
#Hiển thị lương trung bình của nhân viên trong công ty
Select round(avg(Luong),2) as LuongTB from NhanVien;
#Lấy nhân viên có lương lớn nhất và thấp nhất trong công ty
Select max(Luong) as LuongLonNhat, min(Luong) as LuongThapNhat from NhanVien;
#Hiển thị tổng số lương công ty cần trả cho người lao động hàng tháng
Select sum(Luong) from NhanVien;
#Hiển thị danh sách bảng lương của nhân viên theo từng quý, năm của công ty
Select MaNV, HoTen, DienThoai, Email, DiaChi, Luong*3 as LuongQuy, Luong*12 as LuongNam
from NhanVien;

Select MaNV, HoTen, DienThoai, Email, DiaChi, 
Round((hs.HeSo*3500000+hs.PhuCap),0)*3 LuongQuy,
Round((hs.HeSo*3500000+hs.PhuCap),0)*12 LuongNam from NhanVien nv 
inner join HeSoLuong hs on nv.heSo = hs.Id;

 #Tách lấy tên từ họ tên
 Select SUBSTR('Bui Quang Dang', 
 LENGTH('Bui Quang Dang') - INSTR(Reverse('Bui Quang Dang'), ' ')+1);
 
 Select LENGTH('Bùi Quang Đăng') - INSTR(Reverse('Bùi Quang Đăng'), ' ');
 
 DELIMITER $$
 Create function TachTen(fullName varchar(150))
 Returns varchar(50)
 BEGIN
 #Khai báo biến
 Declare ten varchar(50);
 #Xử lý tách chuỗi
 set ten = (Select SUBSTR(fullName, 
 LENGTH(fullName) - INSTR(Reverse(fullName), ' ')+1)
 );
 #Trả về kết quả
 return ten;
 END $$
 DELIMITER ;
 
 Select Replace('Bùi Quang Đăng','ù','u');
Select Replace('Bùi Quang Đăng','ă','a');

 Select TachTen('Bui Quang Dang');
 
 # Viết chuyển từ tiếng việt về ko dấu
 
 
 Select MaNV, HoTen, TachTen(HoTen) as Ten from NhanVien;
#Lấy danh sách các cán bộ đang là trưởng phòng các phòng ban trong công ty
#Hiển thị danh sách nhân viên sắp xếp theo tên tăng dần theo thứ tự abc

#Hiển thị danh sách các nhân viên trong phòng Công nghệ thông tin với tổng lương
#sắp xếp giảm dần
Select MaNV, HoTen, DienThoai, Email, DiaChi, Luong from NhanVien
where MaPhong = 'CNTT'
order by Luong desc;

#Hiển thị top 3 nhân viên có tổng lương cao nhất trong công ty
Select MaNV, HoTen, DienThoai, Email, DiaChi, Luong from NhanVien
order by Luong desc
LIMIT  3;

#Lấy thông tin bảng lương của nhân viên được hưởng bao gồm: Mã NV, Họ tên,
#Điện thoại, Email, địa chỉ, Tổng lương.
Select MaNV, HoTen, DienThoai, Email, DiaChi, 
Round((hs.HeSo*3500000+hs.PhuCap),1)
 as TongLuong from NhanVien nv inner join HeSoLuong hs on nv.heSo = hs.Id;
#Thống kê số lượng nhân viên theo từng phòng ban trong công ty
Select pb.MaPhong, TenPhong, count(*) as SoLuongNV
from NhanVien nv inner join PhongBan pb on nv.MaPhong = pb.MaPhong
group by pb.MaPhong, TenPhong;
#Thống kê số lượng nhân viên trong công ty theo địa chỉ
Select DiaChi, count(*) as SoLuongNV from NhanVien
group by DiaChi;
#Thống kê số lượng nhân viên trong công ty theo hệ số lương đang được hưởng
Select HeSo, count(*) as SoLuongNV from NhanVien
group by HeSo;
#Hãy dựa trên hệ số lương để tính được thời gian vào công ty của nhân viên đó.
Select MaNV, HoTen, DienThoai, Luong, hs.HeSo, (2020 - nv.HeSo*2) as NamVaoCongTy
from NhanVien nv inner join HeSoLuong hs on nv.HeSo = hs.id;
#Hiển thị danh sách bảng lương mới năm 2020 của cán bộ, nhân viên trong công ty. o Thống kê tổng lương mà công ty phải trả cho các nhân viên theo từng phòng ban o Lấy các lương lớn nhất, nhỏ nhất và lương trung bình theo từng phòng ban trong
#công ty
Select MaNV, HoTen, DienThoai, Email, DiaChi, 
Round((hs.HeSo*3500000+hs.PhuCap),1)
 as TongLuong from NhanVien nv inner join HeSoLuong hs on (nv.heSo+1) = hs.Id
 order by Round((hs.HeSo*3500000+hs.PhuCap),1) desc;
 Select * from HeSoLuong;
 Update NhanVien set HeSo = HeSo + 1;
 
#Lấy tất cả các nhân viên có lương lớn hơn lương trung bình trong công ty
Select MaNV, HoTen, DienThoai, Email, DiaChi, Luong from NhanVien
where Luong > 
(
Select avg(Luong) from NhanVien
);

#Hiển thị danh sách các cán bộ, nhân viên trong công ty trong đó yêu cầu lãnh đạo
#phải đứng đầu tiên trong danh sách

#Tạo thủ tục lấy danh sách nhân viên
DELIMITER $$
Create procedure SP_LayDanhSachNhanVien()
Begin
	Select MaNV, HoTen, DienThoai, Email, DiaChi, MaPhong from NhanVien;
End$$;
DELIMITER ;

#Gọi thủ tục ra
call SP_LayDanhSachNhanVien();


#Tạo thủ tục lấy chi tiết nhân viên theo mã
DELIMITER $$
Create procedure SP_LayChiTietNhanVienTheoMa(
ma varchar(10)
)
Begin
	Select MaNV, HoTen, DienThoai, Email, DiaChi, MaPhong 
    from NhanVien where MaNV = ma;
End$$;
DELIMITER ;

#Gọi thủ tục lấy chi tiết
call SP_LayChiTietNhanVienTheoMa('SF001');

#Tạo thủ tục thêm mới nhân viên
DELIMITER $$
Create procedure SP_ThemMoiNhanVien(
ma varchar(10),
ht varchar(30),
dt varchar(20),
mail varchar(50),
dc varchar(150)
)
Begin
	Insert into NhanVien(MaNV, HoTen, DienThoai, Email, DiaChi)
    values(ma, ht, dt, mail, dc);
End$$;
DELIMITER ;

#Gọi thủ tục thêm mới
call SP_ThemMoiNhanVien('SF048','Lê Công Minh','099822356',
'congminh@yahoo.com','Hà Nam');

SHOW PROCEDURE STATUS;

