<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function dangNhap()
    {
        return view('DangNhap');
    }

    public function thucHienDangNhap(Request $request)
    {
        //Khai báo biến
        $tenDN = ""; $matKhau = "";

        $tenDN = $request->input('tenDangNhap');
        $matKhau = $request->input('matKhau');

        echo "Tên đăng nhập là: " . $tenDN . "<br>";
        echo "Mật khẩu là: " . $matKhau;

        if($tenDN == "stanford" && $matKhau == "123")
        {
            //Lưu thông tin vào session
            session(['userCurrent'=>$tenDN]);

            return view('trangChu')->with(['tenDangNhap'=>$tenDN]);
        }
        else{
        return view('DangNhap');
        }
    }

    public function danhSach()
    {
        $arr = Array();

        array_push($arr, ['maNV'=>"SF001", 'hoTen'=>"Anh", 'tuoi'=>30, 'diaChi'=>"Hà Nội"]);
        array_push($arr, ['maNV'=>"SF002", 'hoTen'=>"Nam", 'tuoi'=>25, 'diaChi'=>"Hà Nội"]);

        return view('danhsach', ['nhanViens'=>$arr]);
    }
}
