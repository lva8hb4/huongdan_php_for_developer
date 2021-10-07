<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    /**
     * Thiết lập các cột tự động gán được dữ liệu từ form
     *
     * @var array
     */
    protected $fillable = [
        'SachId',
        'TenSach',
        'AnhSach',
        'MoTa',
        'GiaSach',
        'TacGia',
        'MaChuDe',
    ];

    // Thay đổi các thiết lập ngầm định của Eloquent Model
    protected $table = 'Sach';
    public $primaryKey = 'SachId';
    public $incrementing = true;

    //Không sử dụng thông tin log của model khi thay đổi
    public $timestamps = false;

    //Một sách chỉ thuộc 1 chủ đề
    public function ChuDe()
    {
        return $this->belongsTo('App\Models\ChuDe','MaChuDe','MaChuDe');
    }
}
