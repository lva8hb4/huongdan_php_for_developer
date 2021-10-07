<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;

    //Khai báo những cột sẽ tự động gán dữ liệu từ form trong Laravel
    protected $fillable = [
        'MaPhong',
        'TenPhong'
    ];

    //Thay đổi các thiết lập ngầm định của Eloquent Model
    protected $table = 'PhongBan';
    public $primaryKey = 'MaPhong';
    public $incrementing = false;
    public $timestamps = false;
}
