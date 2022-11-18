<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;

class TheLoaiController extends Controller
{
     private $theloai;

     public function __construct()
     {
        $this->theloai = new TheLoai();
     }
     public function index(){

        $theloai = $this->theloai->DanhsachTheloai();
        return view('admin.theloai.danhsach', compact('theloai'));
    }


    public function getThemTheLoai(){
        
        return view('admin.theloai.them');
    }

     public function postThemTheLoai(Request $request){

        $request->validate([
            'tentheloai' => 'required',
        ],[
            'tentheloai.required' => 'Tên thể loại không được để trống',
        ]);

        $dataIsert = [
            'tentheloai' => $request->tentheloai,
            'tenkhongdau' => convert_Unsigned($request->tentheloai),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];
        $theloai = $this->theloai->ThemTheloai($dataIsert);

        return back()->with('thongbao', 'Thêm thành công');
    }

    public function getSuaTheLoai(){
        

        return view('admin.theloai.sua');
    }

    public function postSuaTheLoai(){
        
        return 'sua thanh công';
    }

     public function deleteTheLoai(){
        
        return 'xoa thanh công';
    }

}