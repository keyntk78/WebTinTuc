<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function index(){
        
        return view('admin.binhluan.danhsach');
    }

    public function deleteBinhLuan(){
        
        return 'xoa thanh công';
    }
}