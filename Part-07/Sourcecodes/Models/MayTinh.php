<?php


namespace App\Models;


class MayTinh
{
    public $tenMay = "";
    public $tenHang = "";
    public function inThongTin()
    {
        echo "Tên máy tính: " . $this->tenMay . "<br>";
        echo "Hãng sản xuất: " . $this->tenHang . "<br>";
    }
}
