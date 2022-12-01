<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use  App\Models\TheLoai;
use  App\Models\TinTuc;


class PageControllers extends Controller
{
    private $users;
    private $theloai;
    private $tintuc;



    public function __construct()
    {
        $this->users = new User();
        $this->theloai = new TheLoai();
        $this->tintuc = new TinTuc();

    }

    public function index()
    {
        $list_4 =$this->theloai->Top_4_Theloai();
        $noibat = $this->tintuc->TinNoiBat();
        $moinhat = $this->tintuc->MoiNhat();

        return view('pages.trangchu', compact('list_4', 'noibat', 'moinhat'));
    }

    public function ChiTietTinTuc ($id, $tieudekhongdau){

         if(!empty($id)){
            $chitiettintuc = $this->tintuc->ChietTietTinTucPage($id);
            if(!empty($chitiettintuc[0])){
                $chitiettintuc = $chitiettintuc[0];
                 return view('pages.chitiettintuc', compact('chitiettintuc'));
            } else {
                return redirect()->route('trangchu')->with('thongbao', 'Tin tức không tồn tại');
            }
        } else {
            return redirect()->route('trangchu')->with('thongbao', 'Liên kết không tồn tại');
        }
    }

    public function dangnhap()
    {
        return view('pages.dangnhap');
    }

    public function postDangNhap(Request $request)
    {
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required|min:6|max:32'
        ],
        [
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu từ 6 kí tự trở lên',
            'password.max'=>'Mật khẩu không được quá 32 kí tự'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->route('trangchu')->with('thongbao', 'Đăng nhập thành công');
        } else {
            return back()->with('thongbao', 'Đăng nhập không thành công: sai email hoặc mật khẩu');
        }

    }

    public function dangxuat(){
        Auth::logout();
        return redirect(route('trangchu'));
    }

    public function getDangKy()
    {
        return view('pages.dangky');
    }

    public function postDangKy(Request $request)
    {
        $request->validate([
            'hoten' => 'required',
            'email' => 'required|email|unique:users',
            'password'=>'required|min:6',
            'c_password' => 'required|same:password'

        ],[
            'hoten.required' => 'Họ tên bắc buộc phải nhập',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email phải là email',
            'emmail.unique' => 'Email đã tồn tại',
            'password.required' =>'Mật khẩu bắt buộc phải nhập',
            'password.min' =>'Mật khẩu phải trên 6 ký tự',
            'c_password.required' =>'Nhập lại mật khẩu bắt buộc phải nhập',
            'c_password.same' =>'Nhập lại mật khẩu không đúng'
        ]);

        $dataIsert = [
            'hoten' => $request->hoten,
            'email' => $request->email,
            'password' => Hash::make($request->password) ,
            'quyen' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

        $this->users->dangky($dataIsert);
        // dd($dataIsert);

        return redirect(route("dangnhap"))->with('thongbao', 'Đăng ký thành công');
    }
}