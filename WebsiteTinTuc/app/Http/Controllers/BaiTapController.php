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




    // bai tap sql 
    // bai tap 1
    
    public function sql_baitap1()
    {
        return view('pages.baitap.sql.baitap1');
    }

    // bai tap 2
    public function sql_baitap2()
    {
        return view('pages.baitap.sql.baitap2');
    }
    // bai tap 3
    public function sql_baitap3()
    {
        return view('pages.baitap.sql.baitap3');
    }
    // bai tap 4
    public function sql_baitap4()
    {
        return view('pages.baitap.sql.baitap4');
    }
    // bai tap 5
    public function sql_baitap5()
    {
        return view('pages.baitap.sql.baitap5');
    }
    // bai tap 6
     public function sql_baitap6()
     {
         return view('pages.baitap.sql.baitap6');
     }
     // bai tap 7
     public function sql_baitap7()
     {
         return view('pages.baitap.sql.baitap7');
     }
     // bai tap 8
     public function sql_baitap8()
     {
         return view('pages.baitap.sql.baitap8');
     }
      // bai tap 9
    //   public function sql_baitap9()
    //   {
    //       return view('pages.baitap.sql.baitap9');
    //   }
    //   // bai tap 10
    //   public function sql_baitap10()
    //   {
    //       return view('pages.baitap.sql.baitap10');
    //   }
}