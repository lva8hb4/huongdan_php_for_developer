#Mã NV, Họ tên, Giới tính, Ngày sinh, Điện thoại, Email, Địa chỉ, Số CMT, Ngày cấp, Nơi cấp, Mã phòng, Hệ số lương, Chức vụ,...
Create table NhanVien
(
    MaNV varchar(10) primary key,
    HoTen varchar(30),
    GioiTinh tinyint,
    NgaySinh date,
    DienThoai varchar(20),
    Email varchar(50),
    DiaChi varchar(200),
    SoCMT varchar(15),
    NgayCap date,
    NoiCap varchar(150),
    MaPhong varchar(10),
    HeSo int,
    MaChucVu varchar(10)
    );
#Mã phòng, Tên phòng, Điện thoại.
Create table PhongBan
(
    MaPhong varchar(10) primary key,
    TenPhong varchar(150)
    );
#Mã chức vụ, Tên chức vụ
Create table ChucVu
(
    MaChucVu varchar(10) primary key not null,
    TenChucVu varchar(150) not null
 );
 #Id, Hệ số lương, Phụ cấp, Mô tả
 Create table HeSoLuong
 (
     Id int AUTO_INCREMENT primary key,
     HeSo float,
     PhuCap float,
     MoTa varchar(500)
     );
#Id, Ngày đi làm, Thời gian vào, Thời gian ra, Mã nhân viên
Create table ChamCong
(
    Id int AUTO_INCREMENT primary key,
    NgayDiLam date,
    ThoiGianVao time,
    ThoiGianRa time,
    MaNV varchar(10)
    );
    
 #Thiết lập quan hệ
#Thiết lập quan hệ giữa NhanVien và ChucVu
Alter table NhanVien
add constraint FK_ChucVu_Id foreign key(MaChucVu)
references ChucVu(MaChucVu);

#Thiết lập quan hệ giữa NhanVien và PhongBan
Alter table NhanVien
add constraint FK_PhongBan_Id foreign key(MaPhong)
references PhongBan(MaPhong);

#Thiết lập quan hệ giữa NhanVien và HeSoLuong
Alter table NhanVien
add constraint FK_HeSoLuong_Id foreign key(HeSo)
references HeSoLuong(Id);

#Thiết lập quan hệ giữa ChamCong và NhanVien
Alter table ChamCong
add constraint FK_NhanVien_Id foreign key(MaNV)
references NhanVien(MaNV);

#Thêm thông tin chức vụ
Insert into ChucVu values('GD','Giám đốc');
Insert into ChucVu values('TP','Trưởng phòng');
Insert into ChucVu values('KD','Nhân viên Kinh doanh');
Insert into ChucVu values('TV','Tư vấn viên');
Insert into ChucVu values('MKT','Nhân viên Marketing');
Insert into ChucVu values('LTV','Lập trình viên');
Insert into ChucVu values('KT','Kế toán');

#Thêm thông tin phòng ban
Insert into PhongBan(MaPhong, TenPhong)
values('CNTT', 'Công nghệ thông tin');
Insert into PhongBan(MaPhong, TenPhong)
values('DT', 'Đào tạo');
Insert into PhongBan(MaPhong, TenPhong)
values('KD', 'Kinh doanh');
Insert into PhongBan(MaPhong, TenPhong)


#Hàm làm tròn số
#Select Round(5.236,2);

#Hàm làm tròn số cận trên
#Select Ceiling(5.236);
#Hàm làm tròn cận dưới
#Select Floor(5.245);
#Làm cắt lấy bao số sau dấu phẩy
#Select TRUNCATE(4.236,2);
#Hàm lấy số mũ
#Select power(2, 3);
#Hàm lấy căn bậc hai
#Select Sqrt(9);

#Hàm số học
#Select lower('Stanford - Day lap trinh');
#Hàm chuyển về chữ hoa
#Select Upper('Stanford - Day lap trinh');
#Hàm cắt kí tự trắng bên trái
#Select Concat('Stanford ', LTRIM('      Day lap trinh'));
#Hàm thay thế
#Select REPLACE('Stanford - Day lap trinh','t','T');
#Hàm lấy chuỗi con
#Select SUBSTR('Stanford - Day lap trinh',1,9);
#Lấy độ lớn của 1 chuỗi
#Select Length('Stanford');
#Lấy vị trí của kí tự t trong chuỗi
#Select INSTR('Stanford day lap trinh','t');
#Hàm đảo ngược chuỗi
#Select Reverse('Stanford');
#Lấy ngày hiện tại
#Select now();
#Select Curdate();
#Chuyển về ngày
#Select Date('20/03/2021');
#Thêm vào ngày hiện tại 10 ngày
#Select Date_Add(now(), INTERVAL 10 DAY);

#So sánh 2 ngày
#Select DateDiff('2021/03/12', '2021/03/01');
#Select sysdate();
#Lấy ngày, tháng, năm của ngày hiện thời
#Select Extract(day from now()) as ngay,
#Extract(month from now()) as thang, Extract(year from now()) as nam;
#Chuyển từ chuỗi sang số
#Select Cast('025' as int)*2;
#Chuyển từ chuỗi về ngày tháng
#Select Convert('2021-03-25',date);
