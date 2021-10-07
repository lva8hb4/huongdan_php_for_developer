<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PhongBanBuilderController extends Controller
{
    public function danhSach()
    {
        $phongBan = DB::table('PhongBan')->get();

        return view('phongban1.danhsach', ['phongBans'=>$phongBan]);
    }

     public function danhSachNhomNhanVien()
    {
        $phongBan = DB::table('NhanVien')->select(DB::raw('count(*) as SoLuong, MaPhong'))->groupBy('MaPhong')->get();

        print_r($phongBan);
        return view('phongban1.danhsachgroup', ['phongBans'=>$phongBan]);
    }

    public function viewThemPhong()
    {
        return view('phongban.phongadd');

    }
    public function themMoiPhong(Request $request)
    {
        $ma = $request->input('maPhong');
        $tenPhong = $request->input('tenPhong');

        DB::table('PhongBan')->insert(['MaPhong'=>$ma, 'TenPhong'=>$tenPhong]);

        $thongBao = "Thêm mới phòng ban thành công";

        return view('phongban1.phongadd', ['thongBao'=>$thongBao]);
    }

    public function chiTietSua($id)
    {
        $phongBan;

    	if(isset($id))
    	{
			 $phongBan = DB::table('PhongBan')->Where('MaPhong', $id)->first();
       }
        return view('phongban1.phongsua', ['phong'=> $phongBan]);

    }

    public function suaThongTin(Request $request, $id)
    {
 
        $tenPhong = $request->input('tenPhong');

        DB::table('PhongBan')->where('MaPhong', $id)->update(['TenPhong'=>$tenPhong]);

        $thongBao = "Sửa phòng ban thành công";

        return redirect('/phongban1/danhsach');
    }

    public function xoaPhongBan($id)
	{
		if(isset($id))
		{
			DB::table('PhongBan')->where('MaPhong', $id)->delete();
			return redirect('/phongban1/danhsach');
		}

		return view('phongban1.danhsach');
	}
}
