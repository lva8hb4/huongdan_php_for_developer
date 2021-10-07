<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    //Khai báo những cột sẽ tự động gán dữ liệu từ form trong Laravel
    protected $fillable = [
        'MaNV',
        'HoTen',
        'DienThoai',
        'NgaySinh',
        'Email',
        'DiaChi',
        'MaPhong'
    ];

    //Thay đổi các thiết lập ngầm định của Eloquent Model
    protected $table = 'NhanVien';
    public $primaryKey = 'MaNV';
    public $incrementing = false;
    public $timestamps = false;
}
