#Tạo 1 hàm để đếm số lượng tổng nhân viên trong bảng
Delimiter $$
Create function TongSoNhanVien()
Returns int
BEGIN
#Khai báo biến
Declare tongSo int;
#Gán giá trị cho biến lấy được từ câu lệnh truy vấn
set tongSo = (Select count(*) from NhanVien);
#Trả về kết quả
return tongSo;
END $$;
Delimiter ;;

#Gọi hàm để sử dụng
Select TongSoNhanVien();

#Hàm đếm số lượng nhân viên theo mã phòng
#Tạo 1 hàm để đếm số lượng tổng nhân viên trong bảng
Delimiter $$
Create function TongSoNhanVienTheoPhong(ma varchar(10))
Returns int
BEGIN
#Khai báo biến
Declare tongSo int;
#Gán giá trị cho biến lấy được từ câu lệnh truy vấn
set tongSo = (Select count(*) from NhanVien where MaPhong = ma);
#Trả về kết quả
return tongSo;
END $$;
Delimiter ;

#Gọi hàm để sử dụng
Select TongSoNhanVienTheoPhong('CNTT');

#Sử dụng trong câu lệnh truy vấn
Select MaPhong, TenPhong, 
TongSoNhanVienTheoPhong(MaPhong) as SoLuongNV
 from PhongBan;
 
 #Xem các hàm trong db
 show function status;
 
 #Xoá hàm
 drop function TongSoNhanVienTheoPhong;
 
 #Tạo ra view hay khung nhìn
 Create or replace view vBangLuongNhanVien
 as
 Select MaNV, HoTen, DienThoai, Email, DiaChi, round((hs.HeSo*3500000 + hs.PhuCap)
 , 1) as TongLuong, pb.MaPhong, TenPhong from NhanVien nv
 inner join PhongBan pb on nv.MaPhong = pb.MaPhong
  inner join HeSoLuong hs on nv.HeSo = hs.id;
 
 #Gọi view
 Select * from vBangLuongNhanVien;
 
 #Xem các view trong db
 show full tables where table_type='VIEW';
 
 #Xoá khung nhìn
 drop view if exists vBangLuongNhanVien;
 
 #Tạo ra 1 bảng mới
 Create table NhatKy
 (
 Id int primary key Auto_Increment,
 NoiDung varchar(1000),
 HanhDong varchar(20),
 NgayTao date
 );
 
 #Tạo 1 trigger mới
 Delimiter $$
 Create trigger Auto_NhatKy_Trigg
 before insert on NhanVien
 For Each Row
 Begin
	Insert into NhatKy(NoiDung, HanhDong, NgayTao)
    values(Concat('Thêm mới nhân viên có mã: ', NEW.MaNV, ', Họ tên: ', NEW.HoTen,
    ', Điện thoại: ', NEW.DienThoai, ', Email: ', NEW.Email), 'ThemMoi', NOW());
    
 End $$
 
 #Xem các trigger trong db
 Show triggers;
 
 Select * from NhanVien;
 
 #Thêm mới 1 nhân viên
 Insert into NhanVien(MaNV, HoTen, DienThoai, Email, DiaChi)
 values('SF049', 'Trần Trọng Minh', '0988223446', 'trongminh@gmail.com', 'Hà Nam');
 Select * from NhatKy;
 
 #Tạo index
Create index idx_Email on NhanVien(Email);
Create index idx_HoTen on NhanVien(HoTen);
  
 #Xem index trong db
 Show indexes from NhanVien;
 
 #Xoá thông tin index
 Drop index idx_Email on NhanVien;
 
  Select * from NhanVien where Email like '%gmail%';
  
 Explain
 Select * from NhanVien where HoTen like '%Nguyễn%';
 
  #Thêm mới 1 nhân viên
 Insert into NhanVien(MaNV, HoTen, DienThoai, Email, DiaChi)
 values('SF050', 'Trần Tuấn Nam', '0988221258', 'tuannam@gmail.com', 'Hà Nam');
 Select * from NhatKy;
 
 ##Thêm mới 1 nhân viên
 Insert into NhanVien(MaNV, HoTen, DienThoai, Email, DiaChi)
 values('SF049', 'Trần Trọng Minh', '0988223446', 'trongminh@gmail.com', 'Hà Nam');
 Select * from NhatKy;
 
 #Tạo index
Create index idx_Email on NhanVien(Email);
Create index idx_HoTen on NhanVien(HoTen);
  
 #Xem index trong db
 Show indexes from NhanVien;
 
 #Xoá thông tin index
 Drop index idx_Email on NhanVien;
 
  Select * from NhanVien where Email like '%gmail%';
  
 Explain
 Select * from NhanVien where HoTen like '%Nguyễn%';
 
  #Thêm mới 1 nhân viên
 Insert into NhanVien(MaNV, HoTen, DienThoai, Email, DiaChi)
 values('SF050', 'Trần Tuấn Nam', '0988221258', 'tuannam@gmail.com', 'Hà Nam');
 Select * from NhatKy;
 
 #Xây dựng các thủ tục để lấy danh sách, thông tin chi tiết, thêm mới, 
 #cập nhật và xóa của các bảng trong hệ thống
 #Tạo thủ tục cập nhật nhân viên
DELIMITER $$
Create procedure SP_CapNhatNhanVien(
ma varchar(10),
ht varchar(30),
dt varchar(20),
mail varchar(50),
dc varchar(150)
)
Begin
 Update NhanVien set HoTen =ht, DienThoai = dt, Email = mail, DiaChi = dc
 where MaNV = ma;
End$$;
DELIMITER ;

 #Tạo thủ tục xoá nv
DELIMITER $$
Create procedure SP_XoaNhanVien(
ma varchar(10)
)
Begin
 Delete from NhanVien 
 where MaNV = ma;
End$$;
DELIMITER ;

 #Tạo thủ tục lấy chi tiết nv
DELIMITER $$
Create procedure SP_ChiTietNhanVienTheoMa(
ma varchar(10)
)
Begin
 Select * from NhanVien 
 where MaNV = ma;
End$$;
DELIMITER ;

#Gọi thủ tục
call SP_LayDanhSachNhanVien();

call SP_ChiTietNhanVienTheoMa('SF001');

call SP_CapNhatNhanVien('SF050', 'Lê Tuấn Hà','099234568','tuanha@yahoo.com','Hải Phòng');

#Hàm tính tổng lương
Delimiter $$
Create function TongLuong(maHeSo int)
Returns double
BEGIN
#Khai báo biến
Declare tuongLuong double;
#Gán giá trị cho biến lấy được từ câu lệnh truy vấn
set tuongLuong = (Select HeSo*3500000 + PhuCap from HeSoLuong
 where Id = maHeSo);
#Trả về kết quả
return round(tuongLuong,0);
END $$;
Delimiter ;

Drop function TongLuong;

Select TongLuong(1);

#Sử dụng trong câu lệnh truy vấn
Select MaNV, HoTen, DienThoai, Email, DiaChi, TongLuong(HeSo) as TongLuongNV
from NhanVien;

Select * from HeSoLuong;


