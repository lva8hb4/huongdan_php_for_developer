<?php
namespace App\Models;
use App\Models\NhanVienBusiness;
class DataProvider
{
    public static function getNhanVienBus()
    {
        return new NhanVienBusiness();
    }
}