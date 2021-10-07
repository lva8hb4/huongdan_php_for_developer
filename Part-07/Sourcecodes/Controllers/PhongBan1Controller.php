<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PhongBan1Controller extends Controller
{
    //Hàm lấy danh sách
    public function danhSach()
    {
        $phongBan = DB::select('Select * from PhongBan');

        return view('phongban2.danhsach', ['phongBans'=>$phongBan]);
    }

    //Hàm hiển thị form thêm mới
    public function hienThiThemPhong()
    {
        return view('phongban2.phongadd');
    }

    //Hàm thực hiện thêm mới khi nhấn nút thêm mới trên giao diện thêm mới phòng ban
    public function themMoiPhong(Request $request)
    {
        $ma = $request->input('maPhong');
        $ten = $request->input('tenPhong');

        DB::insert('insert into PhongBan(MaPhong, TenPhong) values(?, ?)', [$ma, $ten]);
        $thongBao = "Thêm mới phòng ban thành công";
        return view('phongban2.phongadd', ['thongBao'=>$thongBao]);
    }

    //Hàm hiển thị thông tin chi tiết trước khi sửa
    public function chiTietSua($id)
    {
        $objPhong;
        if(isset($id))
        {
            $phong = DB::select('Select * from PhongBan where MaPhong =:ma', ['ma'=>$id]);
            foreach($phong as $pb)
            {
                $objPhong = $pb;
            }
        }

        return view('phongban2.phongedit', ['phong'=>$objPhong]);
    }

    //Xử lý cập nhật phòng ban trong TH sửa
    public function suaThongTin(Request $request, $id)
    {
        $tenPhong = $request->input('tenPhong');
        DB::update('update PhongBan set TenPhong = ? where MaPhong = ?', [$tenPhong, $id]);
        
        return redirect('/phongban2/danhsach');
    }

    //Xoá thông tin phòng ban
    public function xoaPhongBan($id)
    {
        if(isset($id))
        {
            DB::delete('Delete from PhongBan where MaPhong =:ma', ['ma'=>$id]);
            return redirect('/phongban2/danhsach');
        }

        return view('phongban2.danhsach');
    }
}
