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
}
