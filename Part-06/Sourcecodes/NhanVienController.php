<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    
    public function danhSachNhanVien()
    {
        $arr = Array(
            Array("maNV"=>"SF001", "hoTen"=>"Anh", "tuoi"=>24, "diaChi"=>"Hà Nội"),
            Array("maNV"=>"SF002", "hoTen"=>"Nam", "tuoi"=>26, "diaChi"=>"Hà Nội")
        );
        
        return view('nhanvien.danhsach', ['nhanViens'=>$arr]);
    }

    public function themMoiNhanVien()
    {
        return view('nhanvien.nhanvien-add');
    }
}
