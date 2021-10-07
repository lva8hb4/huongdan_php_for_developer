<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NhanVien;
use App\Models\PhongBan;
class NhanVienController extends Controller
{
    //Hàm lấy danh sách nhân viên từ db
    public function danhSachNhanVien()
    {
        $nhanVien = NhanVien::all();
        
        return view('nhanvien.danhsach', ['nhanViens'=>$nhanVien]);
    }

    public function danhSachNhanVien2()
    {
        $bus = app('nhanVienBus');

        $lstNV = $bus->layDanhSach();

        return view('nhanvien.danhsach2', ['nhanViens'=>$lstNV]);
    }

    public function themMoiNhanVien()
    {
        $phong = PhongBan::all();

        return view('nhanvien.nhanvien-add', ['phongBans'=>$phong]);
    }

    public function thucHienThemMoiNhanVien(Request $request)
    {
        $objNV = new NhanVien($request->all());
        $objNV->MaPhong = $request->input('cboPhong');
        $objNV->save();
        /*$maNV = $request->input('maNV');
        $hoTen = $request->input('hoTen');
        $dienThoai = $request->input('dienThoai');
        $email = $request->input('email');
        $diaChi = $request->input('diaChi');*/

        //Thêm mới nhân viên
        //NhanVien::create(['MaNV'=>$maNV, 'HoTen'=>$hoTen, 'DienThoai'=>$dienThoai, 'Email'=>$email, 'DiaChi'=>$diaChi]);

        return redirect('nhanvien/danhsach');
    }

    /**
     * Hiển thị trước khi sửa
     */
    public function hienThiChiTiet($id)
    {
        //Lấy thông tin chi tiết của nhân viên
        $objNV = NhanVien::find($id);

        return view('nhanvien.nhanvien-edit', ['objNV'=>$objNV]);
    }

     /**
      * Cập nhật thông tin nhân viên
      */
     public function capNhatNhanVien(Request $request, $id)
    {
        //Ánh xạ thông tin từ giao diện form xuống code
        $objNV = NhanVien::find($id);

        $maNV = $request->input('MaNV');
        $hoTen = $request->input('HoTen');
        $dienThoai = $request->input('DienThoai');
        $email = $request->input('Email');
        $diaChi = $request->input('DiaChi');

        $objNV->MaNV = $id;
        $objNV->HoTen = $hoTen;
        $objNV->DienThoai = $dienThoai;
        $objNV->Email = $email;
        $objNV->DiaChi = $diaChi;
        $objNV->update();

        $thongBao = "Cập nhật nhân viên thành công";

        return view('nhanvien.nhanvien-edit', ['objNV'=>$objNV, 'thongBao'=>$thongBao]);
    }

    public function xoa($id)
    {
        //Lấy thông tin nhân viên cần xoá
        $objNV = NhanVien::find($id);

        //Xoá khỏi db
        $objNV->forceDelete();

        return redirect('/nhanvien/danhsach');
    }
}
