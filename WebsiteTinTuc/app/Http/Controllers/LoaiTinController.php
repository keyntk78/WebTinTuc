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

    public function getSuaLoaiTin($id = 0){
        if(!empty($id)){
            $chitietloaitin = $this->loaitin->ChiTietLoaitin($id);
            if(!empty($chitietloaitin[0])){
                $chitietloaitin = $chitietloaitin[0];
                 return view('admin.loaitin.sua', compact('chitietloaitin'));
            } else {
                return redirect()->route('loaitin.index')->with('thongbao', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('loaitin.index')->with('thongbao', 'Liên kết không tồn tại');
        }
    }

    public function postSuaLoaiTin(Request $request,$id){
        $request->validate([
            'tenloaitin' => 'required',
            'id_theloai' => 'required',

       ],[
           'tenloaitin.required' => 'Tên loại tin bắt buộc phải nhập',
           'id_theloai.required' => 'Phải chọn thể loại',

       ]);

       $dataupdate = [
           'tenloaitin' => $request->tenloaitin,
           'id_theloai' => $request->id_theloai,
           'tenkhongdau' => convert_Unsigned($request->tenloaitin),
           'updated_at' =>date('Y-m-d H:i:s'),
       ];

       $this->loaitin->CapNhatloaitin($id, $dataupdate);
        
        return back()->with('thongbao','Cập nhật loại tin thành công');
    }

     public function deleteLoaiTin($id){
        if(!empty($id)){
            $chitietloaitin = $this->loaitin->ChiTietLoaitin($id);
            if(!empty($chitietloaitin[0])){
                $this->loaitin->Xoaloaitin($id);
                 return redirect()->route('loaitin.index')->with('thongbao', 'Xoá loại tin thành công');
            } else {
                return redirect()->route('loaitin.index')->with('thongbao', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('loaitin.index')->with('thongbao', 'Liên kết không tồn tại');
        }
    }
}