<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MySQLController extends Controller
{
    
    public function danhSach()
    {
        $phongBan = DB::select('Select * from PhongBan');

        return view('phongban.danhsach', ['phongBans'=>$phongBan]);
    }

    public function viewThemPhong()
    {
        return view('phongban.phongadd');

    }
    public function themMoiPhong(Request $request)
    {
        $ma = $request->input('maPhong');
        $tenPhong = $request->input('tenPhong');

        DB::insert('insert into PhongBan(MaPhong, TenPhong) values(?, ?)', [$ma, $tenPhong]);

        $thongBao = "Thêm mới phòng ban thành công";

        return view('phongban.phongadd', ['thongBao'=>$thongBao]);
    }

    public function chiTietSua($id)
    {
        $phongBan;

    	if(isset($id))
    	{
			 $phong = DB::select('Select * from PhongBan where MaPhong =:ma', ['ma'=>$id]);

			foreach($phong as $pb)
			{
				$phongBan = $pb;
			}
       }
        return view('phongban.phongsua', ['phong'=> $phongBan]);

    }

    public function suaThongTin(Request $request, $id)
    {
 
        $tenPhong = $request->input('tenPhong');

        DB::insert('Update PhongBan set TenPhong = ? where MaPhong = ?', [$tenPhong, $id]);

        $thongBao = "Sửa phòng ban thành công";

        return redirect('/phongban/danhsach');
    }

    public function xoaPhongBan($id)
	{
		if(isset($id))
		{
			DB::delete('Delete from PhongBan where MaPhong =:ma',['ma'=>$id]);
			return redirect('/phongban/danhsach');
		}

		return view('phongban.danhsach');
	}
}
