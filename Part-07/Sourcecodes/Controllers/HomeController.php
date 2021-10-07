<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function hienThiTrangChu(Request $request)
    {
        //Lấy thông tin từ session
        $tenDangNhap = $request->session()->get('userCurrent');

        //echo "Tên đăng nhập là: " . $tenDangNhap;
        return view('trangChu');
    }

    public function hienThiMayTinh()
    {
        //Lấy thông tin từ container ra
        $com = app('computer');

        $com->inThongTin();
    }
}
