<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinTucController extends Controller
{
       public function index(){
        
        return view('admin.tintuc.danhsach');
    }


    public function getThemTinTuc(){
        
        return view('admin.tintuc.them');
    }

     public function postThemTinTuc(Request $request){

      return "thêm thành công";
    }

    public function getSuaTinTuc(){
        
        return view('admin.tintuc.sua');
    }

    public function postSuaTinTuc(){
        
        return 'sua thanh công';
    }

     public function deleteTinTuc(){
        
        return 'xoa thanh công';
    }
}