<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;

class LoaiTinController extends Controller
{

    private $loaitin;
    public function __construct()
    {
        $this->loaitin = new LoaiTin();

    }
       public function index(){
        
        $loaitin =$this->loaitin->DanhSachLoaiTin();
        $loaitin =$this->loaitin->DanhSachLoaiTin();

        return view('admin.loaitin.danhsach',compact('loaitin'));
    }


    public function getThemLoaiTin(){
        
        return view('admin.loaitin.them');
    }

     public function postThemLoaiTin(Request $request){
        $request->validate([
            'tenloaitin' => 'required',
            'id_theloai' => 'required'
        ],[
            'tenloaitin.required' => 'Tên thể loại không được để trống',
            'id_theloai.required' => 'Phải chọn thể loại',
        ]);

        $dataIsert = [
            'tenloaitin' => $request->tenloaitin,
            'id_theloai' => $request->id_theloai,
            'tenkhongdau' => convert_Unsigned($request->tenloaitin),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

    
        $this->loaitin->ThemLoaiTin($dataIsert);

        return back()->with('thongbao', 'Thêm thành công');
    }

    public function getSuaLoaiTin(){
        
        return view('admin.loaitin.sua');
    }

    public function postSuaLoaiTin(){
        
        return 'sua thanh công';
    }

     public function deleteLoaiTin(){
        
        return 'xoa thanh công';
    }
}