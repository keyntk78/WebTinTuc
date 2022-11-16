<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
       public function index(){
        
        return view('admin.loaitin.danhsach');
    }


    public function getThemLoaiTin(){
        
        return view('admin.loaitin.them');
    }

     public function postThemLoaiTin(Request $request){

      return "thêm thành công";
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