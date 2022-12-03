<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;

class BinhLuanController extends Controller
{

    private $binhluan;

    // phương thức khởi tạo
    public function __construct(){
        $this->binhluan = new BinhLuan();
    }

     // danh sách bình luận
    public function index(Request $request){
        
        $perpage = 10;
        $filters =[];
        $keyword = null;

        if (!empty($request->id_tintuc)) {
            $id_tintuc = $request->id_tintuc;
            
            $filters[] = ['binhluan.id_tintuc', '=', $id_tintuc];
        }

        $dsBinhLuan = $this->binhluan->DSBinhLuan($filters, $keyword,$perpage);
        return view('admin.binhluan.danhsach', compact('dsBinhLuan'));
    }

    // xử lý xóa bình luận
    public function deleteBinhLuan($id){
        
        if(!empty($id)){
            $chitietbinhluan = $this->binhluan->ChiTietBinhLuan($id);
            if(!empty($chitietbinhluan[0])){
                $this->binhluan->XoaBinhLuan($id);
                 return redirect()->route('binhluan.index')->with('thongbao', 'Xoá bình luận thành công');
            } else {
                return redirect()->route('binhluan.index')->with('thongbao', 'Bình luận không tồn tại');
            }
        } else {
            return redirect()->route('binhluan.index')->with('thongbao', 'Liên kết không tồn tại');
        }

    }

}