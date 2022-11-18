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

    public function getSuaTheLoai($id = 0){

       
        if(!empty($id)){
            $chitiettheloai = $this->theloai->ChiTietTheLoai($id);  
            if(!empty($chitiettheloai[0])){
                $chitiettheloai = $chitiettheloai[0];
                 return view('admin.theloai.sua', compact('chitiettheloai'));
            } else {
                return redirect()->route('theloai.index')->with('thongbao', 'Thể loại không tồn tại');
            }
        } else {
            return redirect()->route('theloai.index')->with('thongbao', 'Liên kết không tồn tại');
        }
    }

    public function postSuaTheLoai(Request $request,$id){
        
        $request->validate([
            'tentheloai' => 'required',

       ],[
           'tentheloai.required' => 'Tên thể loại bắt buộc phải nhập',

       ]);
        $dataupdate = [
            'tentheloai' => $request->tentheloai,
            'tenkhongdau' => convert_Unsigned($request->tentheloai),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

        $this->theloai->CapNhattheloai($id, $dataupdate);
        return back()->with('thongbao','Cập nhật thể loại thành công');
    }

     public function deleteTheLoai(){
        
        return 'xoa thanh công';
    }

}