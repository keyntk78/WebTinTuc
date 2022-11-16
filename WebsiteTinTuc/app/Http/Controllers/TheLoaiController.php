<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
     public function index(){
        
        return view('admin.theloai.danhsach');
    }


    public function getThemTheLoai(){
        
        return view('admin.theloai.them');
    }

     public function postThemTheLoai(Request $request){

      return "thêm thành công";
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