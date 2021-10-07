<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\ChuDe;
use Illuminate\Support\Facades\Storage;

class SachController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function layDanhSach()
    {
        $sach = Sach::all();

        return view('sach.danhsach', ['sach'=>$sach]);
    }

    public function hienThiThemSach()
    {
        $chuDes = ChuDe::all();
        return view('sach.themmoi', ['chuDes'=>$chuDes]);
    }

    //Hiển thị thông tin chi tiết khi sửa sách
    public function chiTietSach($id)
    {
        $chuDes = ChuDe::all();

        $sach = Sach::find($id);

        return view('sach.suathongtin',['sach'=>$sach, 'chuDes'=> $chuDes]);
    }

    //Thêm mới thông tin sách
    public function themMoiSach(Request $request)
    {       
        $sach = new Sach($request->all());
        //$sach->MoTa = $request->input('MoTa');
        $image = $request->fUpload;
        if($request->hasFile('fUpload'))
        {
            //Lấy tên file ảnh
            $fileName = $image->getClientOriginalName();
            //Lưu vào thư mục images của thư mục storage
            //Cấu hình trong filesystems.php
            $image->storeAs('images', $fileName);
            $sach->AnhSach = $fileName;
        }
        $sach->NgayTao = NOW();
        $sach->MaChuDe = $request->input('cboChuDe');
        $sach->save();

        return redirect('/sach/danhsach');
    }

    //Thêm mới thông tin sách
    public function capNhatSach(Request $request, $id)
    {
        //Lấy thông tin sách cần sửa
        $sach = Sach::find($id);
        //Gán lại thông tin cần sửa
        $sach->TenSach = $request->input('TenSach');
        $sach->MoTa = $request->input('MoTa');
        $sach->GiaSach = $request->input('GiaSach');
        $sach->TacGia = $request->input('TacGia');
        $sach->MaChuDe = $request->input('cboChuDe');
        $image = $request->fUpload;
        if($request->hasFile('fUpload'))
        {
            //Lấy tên file ảnh
            $fileName = $image->getClientOriginalName();
            //Lưu vào thư mục images của thư mục storage
            //Cấu hình trong filesystems.php
            $image->storeAs('images', $fileName);
            $sach->AnhSach = $fileName;
        }
        
        $sach->save();

        return redirect('/sach/danhsach');
    }

    public function xoa($id)
    {
        //Lấy thông tin nhân viên cần xoá
        $objSach = Sach::find($id);

        //Xoá khỏi db
        $objSach->forceDelete();

        //Xoá file trong thư mục
        Storage::delete('images/' . $objSach->AnhSach);

        return redirect('/sach/danhsach');
    }
}
