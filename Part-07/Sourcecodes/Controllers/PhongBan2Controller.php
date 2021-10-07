<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PhongBan2Controller extends Controller
{
    //Hàm lấy danh sách
    public function danhSach()
    {
        $phongBan = DB::table('PhongBan')->get();

        return view('phongban3.danhsach', ['phongBans'=>$phongBan]);
    }

    //Hàm hiển thị form thêm mới
    public function hienThiThemPhong()
    {
        return view('phongban3.phongadd');
    }

    //Hàm thực hiện thêm mới khi nhấn nút thêm mới trên giao diện thêm mới phòng ban
    public function themMoiPhong(Request $request)
    {
        $ma = $request->input('maPhong');
        $ten = $request->input('tenPhong');

        DB::table('PhongBan')->insert(['MaPhong'=>$ma, 'TenPhong'=>$ten]);
        $thongBao = "Thêm mới phòng ban thành công";
        return view('phongban3.phongadd', ['thongBao'=>$thongBao]);
    }

    //Hàm hiển thị thông tin chi tiết trước khi sửa
    public function chiTietSua($id)
    {
        $objPhong;
        if(isset($id))
        {
            $objPhong = DB::table('PhongBan')->where('MaPhong', $id)->first();
        }

        return view('phongban3.phongedit', ['phong'=>$objPhong]);
    }

    //Xử lý cập nhật phòng ban trong TH sửa
    public function suaThongTin(Request $request, $id)
    {
        $tenPhong = $request->input('tenPhong');
        DB::table('PhongBan')->where('MaPhong', $id)->update(['TenPhong'=>$tenPhong]);
        
        return redirect('/phongban3/danhsach');
    }

    //Xoá thông tin phòng ban
    public function xoaPhongBan($id)
    {
        if(isset($id))
        {
            DB::table('PhongBan')->where('MaPhong', $id)->delete();
            return redirect('/phongban2/danhsach');
        }

        return view('phongban2.danhsach');
    }
}
