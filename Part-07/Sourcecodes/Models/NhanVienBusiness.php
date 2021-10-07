<?php
namespace App\Models;
use Illuminate\Support\Facades\Log;
class NhanVienBusiness
{
   public $lstNhanVien;

   public function __construct()
   {
       $this->lstNhanVien = Array();
   }
   public function layDanhSach()
    {
        if(count($this->lstNhanVien) == 0)
        {
            $this->taoDuLieuBanDau();
        }

        return $this->lstNhanVien;
    }

    private function taoDuLieuBanDau()
    {
        //$this->lstNhanVien = Array();

        $nam = new NhanVien();
        $nam->maNV = "SF001";
        $nam->hoTen = "Trần Thành Nam";
        $nam->dienThoai = "0988124568";
        $nam->email = "thanhcong@gmail.com";
        $nam->diaChi = "Hà Nội";
        array_push($this->lstNhanVien, $nam);

        $dung = new NhanVien();
        $dung->maNV = "SF002";
        $dung->hoTen = "Hoàng Anh Dũng";
        $dung->dienThoai = "0988124125";
        $dung->email = "anhdung@gmail.com";
        $dung->diaChi = "Hà Nội";
        array_push($this->lstNhanVien, $dung);

        $ha = new NhanVien();
        $ha->maNV = "SF003";
        $ha->hoTen = "Lê Thị Hà";
        $ha->dienThoai = "0956124136";
        $ha->email = "halt@gmail.com";
        $ha->diaChi = "Nam Định";
        array_push($this->lstNhanVien, $ha);

    }

    /**
     * Hàm thêm mới nhân viên
     */
    public function themMoi($objNV)
    {
        //if(isset($this->lstNhanVien)){
            array_push($this->lstNhanVien, $objNV);
        //}
        echo $objNV->maNV;
        echo $objNV->hoTen;
        Log::debug("Ma NV: " . $objNV->maNV);
        Log::debug("Ma NV: " . $objNV->hoTen);
    }


}