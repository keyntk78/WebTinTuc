<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaiTapController extends Controller
{
    public function index()
    {
        return view('pages.baitap.index');
    }

    public function form_BaiTap1()
    {
        return view('pages.baitap.form.baitap1');
    }

     public function post_form_BaiTap1()
    {
        return view('pages.baitap.form.baitap1');
    }


    // chuoi
    //bt1
    public function chuoi_BaiTap1()
    {
        return view('pages.baitap.chuoi.baitap1');
    }

    public function post_chuoi_BaiTap1()
    {
        return view('pages.baitap.chuoi.baitap1');
    }

    //bt2
    public function chuoi_BaiTap2()
    {
        return view('pages.baitap.chuoi.baitap2');
    }

    public function post_chuoi_BaiTap2()
    {
        return view('pages.baitap.chuoi.baitap2');
    }
    //bt3
    public function chuoi_BaiTap3()
    {
        return view('pages.baitap.chuoi.baitap3');
    }

    public function post_chuoi_BaiTap3()
    {
        return view('pages.baitap.chuoi.baitap3');
    }

    //bt4
    public function chuoi_BaiTap4()
    {
        return view('pages.baitap.chuoi.baitap4');
    }

    public function post_chuoi_BaiTap4()
    {
        return view('pages.baitap.chuoi.baitap4');
    }

    //bt5
    public function chuoi_BaiTap5()
    {
        return view('pages.baitap.chuoi.baitap5');
    }

    public function post_chuoi_BaiTap5()
    {
        return view('pages.baitap.chuoi.baitap5');
    }
     //bt6
     public function chuoi_BaiTap6()
     {
         return view('pages.baitap.chuoi.baitap6');
     }
 
     public function post_chuoi_BaiTap6()
     {
         return view('pages.baitap.chuoi.baitap6');
     }
     //bt7
     public function chuoi_BaiTap7()
     {
         return view('pages.baitap.chuoi.baitap7');
     }
 
     public function post_chuoi_BaiTap7()
     {
         return view('pages.baitap.chuoi.baitap7');
     }
}