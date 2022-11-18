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