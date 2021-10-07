<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NhanVienController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/xinchao', function(){

    return "Chào mừng các bạn đến với Laravel !";
});

Route::get('/xinchao1', function(){
    return view('xinchao1');
});

//Truyền và lấy tham số cũng như gửi dữ liệu ra view
Route::get('/hello/{year}/{name?}', function($year, $name=null){
    $strHello = "";

    if($name== null)
    {
        $strHello = "Xin chào các bạn, năm " . $year;
    }
    else {
        
        $strHello = "Xin chào các bạn, năm " . $year . ", tên: " . $name;
    }

    return view('hello')->with('gioiThieu', $strHello);
});

Route::get('/thongtin', function(Request $request){

    echo 'Địa chỉ IP: ' . $request->ip() . "<br>";
    echo 'Url: ' . $request->fullurl();
});
/*
Route::get('/dangNhap', function(){
    return view('DangNhap');
});

Route::post('/thucHienDangNhap', function(Request $request){

    //Khai báo biến
    $tenDN = ""; $matKhau = "";

    $tenDN = $request->input('tenDangNhap');
    $matKhau = $request->input('matKhau');

    echo "Tên đăng nhập là: " . $tenDN . "<br>";
    echo "Mật khẩu là: " . $matKhau;
});
*/
Route::get('dangNhap', [LoginController::class, 'dangNhap']);

Route::post('doDangNhap', [LoginController::class, 'thucHienDangNhap']);

Route::get('danhsach', [LoginController::class, 'danhsach']);

Route::get('trangChu', [HomeController::class, 'hienThiTrangChu']);

Route::get('hello2', function(){

    return response("Chào mừng các bạn đến với Laravel, 2 !", 200);
});

//Trả dữ liệu về dạng json
Route::get('/user-info', function(){

        $user = ['id'=>'1', 'hoTen'=>'Đăng Quang', 'dienThoai'=>'0987232936'];

        return response($user, 200)->header('Content-Type', 'application/json');
});

//Trả về 1 danh sách dạng json
Route::get('/list-user-json', function(){

        $lstUsers = Array();

        $user1 = ['id'=>'1', 'hoTen'=>'Đăng Quang', 'dienThoai'=>'0987232936'];

        array_push($lstUsers, $user1);

        $user2 = ['id'=>'2', 'hoTen'=>'Nhật Nam', 'dienThoai'=>'0987231245'];
        array_push($lstUsers, $user2);

        return response()->json($lstUsers);
});

//Module NhanVien
Route::get('danhsachnv', [NhanVienController::class, 'danhSachNhanVien']);
Route::get('nhanvien-add', [NhanVienController::class, 'themMoiNhanVien']);