<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChuDe;

class ChuDeApiController extends Controller
{
    /**
     * Hàm lấy danh sách chủ đề
     */
   public function layDanhSach()
   {
       return ChuDe::all();
   }

   /**
    * Hàm lấy chi tiết chủ đề theo mã
    */
   public function chiTietChuDeTheoMa($id)
   {
       return ChuDe::find($id);
   }

   /**
    * Hàm thêm mới chủ đề
    */
   public function themMoi(Request $request)
   {
       return ChuDe::create($request->all());
   }

   /**
    * Cập nhật thông tin chủ đề
    */
   public function capNhat($id, Request $request)
   {
       return ChuDe::where('MaChuDe', $id)->update($request->all());
   }

   /**
    * Xoá thông tin chủ đề
    */
   public function xoaChuDe($id)
   {
       return ChuDe::where('MaChuDe', $id)->delete();
   }
}
