<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaiTapController extends Controller
{
    public function index()
    {
        return view('pages.baitap.index');
    }
    //bài tập 1
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


    //bai tap 3
    public function form_BaiTap3()
    {
        return view('pages.baitap.form.baitap3');
    }

     public function post_form_BaiTap3()
    {
        return view('pages.baitap.form.baitap3');
    }

    //bai tap 6
    public function form_BaiTap6()
    {
        return view('pages.baitap.form.baitap6');
    }

     public function post_form_BaiTap6()
    {
        return view('pages.baitap.form.baitap6');
    }

    public function form_BaiTap6_ketquapheptinh()
    {
        return view('pages.baitap.form.ketquapheptinh');
    }

    //bai tap 7
    public function form_BaiTap7()
    {
        return view('pages.baitap.form.baitap7');
    }

     public function post_form_BaiTap7()
    {
        return view('pages.baitap.form.baitap7');
    }

    public function form_BaiTap7_ketquapheptinh()
    {
        return view('pages.baitap.form.ketquapheptinh');
    }

    //bai tap 8
    public function form_BaiTap8()
    {
        return view('pages.baitap.form.baitap8');
    }

     public function post_form_BaiTap8()
    {
        return view('pages.baitap.form.baitap8');
    }


    //bài tập 2
    public function form_BaiTap2()
    {
        return view('pages.baitap.form.baitap2');
    }

     public function post_form_BaiTap2()
    {
        return view('pages.baitap.form.baitap2');
    }
    //bài tập 4
    public function form_BaiTap4()
    {
        return view('pages.baitap.form.baitap4');
    }

     public function post_form_BaiTap4()
    {
        return view('pages.baitap.form.baitap4');
    }

    //bài tập 5
    public function form_BaiTap5()
    {
        return view('pages.baitap.form.baitap5');
    }

     public function post_form_BaiTap5()
    {
        return view('pages.baitap.form.baitap5');
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
     public function sql_chitietsanpham()
     {
         return view('pages.baitap.sql.chitietsanpham');
     }
     // bai tap 8
     public function sql_baitap8()
     {
         return view('pages.baitap.sql.baitap8');
     }
      // bai tap 9
      public function sql_baitap9()
      {
          return view('pages.baitap.sql.baitap9');
      }
    //   // bai tap 10
      public function sql_baitap10()
      {
          return view('pages.baitap.sql.baitap10');
      }
}

