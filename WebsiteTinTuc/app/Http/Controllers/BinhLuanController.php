<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;

class BinhLuanController extends Controller
{

     private $binhluan;

     public function __construct()
     {
        $this->binhluan = new BinhLuan();
     }

    public function index(){
        
        $dsBinhLuan = $this->binhluan->DSBinhLuan();
        return view('admin.binhluan.danhsach', compact('dsBinhLuan'));
    }

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