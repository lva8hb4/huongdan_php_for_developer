<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\ChuDe;
use App\Models\ClosureSach;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Rules\CustomizeRuleUpper;
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
        //Kiểm tra dữ liệu nhập vào   
        $input = $request->all();
        $rules = [
            'TenSach' => ['required','max:250', new CustomizeRuleUpper()],
            'GiaSach' => 'required|numeric',
            'TacGia'=>'required|max:30'
        ];
        $messages = [
        'TenSach.required' => 'Bạn cần phải nhập tên sách',
        'GiaSach.required' => 'Bạn cần phải nhập giá sách',
        'GiaSach.numeric'=>'Bạn cần phải nhập giá sách kiểu số',
        'TacGia.required'=>'Bạn cần phải nhập tên tác giả',
        'TacGia.max'=>'Bạn cần không được nhập tác giả quá 30 kí tự'
        ];

        $attributes = ['tenDangNhap'=>'tên đăng nhập',
                    'matKhau'=>'mật khẩu'];
        
        $validator = Validator::make($input, $rules, $messages, $attributes);
        /*
        //Sử dụng closure
        $rule1 = [
        'TenSach' => [
            'required',
            'max:255',
            function ($attribute, $value, $fail) {
                if (strtoupper($value) !== $value)
                {
                    $fail("Trường $attribute cần nhập kí tự viết hoa"); 
                }
            },
        ],
        ];
        
        $validator = Validator::make($input, $rule1);
        
*/
        $request->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin');
        $sach = new Sach($request->all());
        if ($validator->fails()) {
           
            return view('sach.themmoi', ['sach'=>$sach])
                        ->withErrors($validator);
        }
        else{ 
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
