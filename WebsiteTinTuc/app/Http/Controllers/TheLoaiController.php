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