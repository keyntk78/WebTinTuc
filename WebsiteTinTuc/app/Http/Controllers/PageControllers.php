<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use  App\Models\TheLoai;
use  App\Models\TinTuc;
use  App\Models\BinhLuan;
use  App\Models\Video;




class PageControllers extends Controller
{
    private $users;
    private $theloai;
    private $tintuc;
    private $binhluan;
    private $video;





    public function __construct()
    {
        $this->users = new User();
        $this->theloai = new TheLoai();
        $this->tintuc = new TinTuc();
        $this->binhluan = new BinhLuan();
        $this->video = new Video();

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
                $dsBinhLuan = $this->binhluan->DSBinhLuanTheoTin($id);
                $soluongbinhluan = $this->binhluan->SoLuongBinhLuan($id);

                 return view('pages.chitiettintuc', compact('chitiettintuc', 'dsBinhLuan', 'soluongbinhluan'));
            } else {
                return redirect()->route('trangchu')->with('thongbao', 'Tin tức không tồn tại');
            }
        } else {
            return redirect()->route('trangchu')->with('thongbao', 'Liên kết không tồn tại');
        }
    }

    public function postBinhLuan(Request $request, $id)
    {


        $request->validate([
            'binhluan' => 'required',
        ],[
            'binhluan.required' => 'Bình luận bắc buộc phải nhập',
        ]);

        $dataIsert = [
            'id_user' => Auth::user()->id,
            'id_tintuc' => $id,
            'noidung' => $request->binhluan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];


        $this->binhluan->ThemBinhLuan($dataIsert);

        return back();
    }


    public function TheLoai ($id, $tenkhongdau){

         if(!empty($id)){
            $dsTinTheoTL = $this->tintuc->DanhSachTinTheoTheLoai($id);
            if(!empty($dsTinTheoTL[0])){
                $tenTheLoai = $this->theloai->ChiTietTheLoai($id)[0]->tentheloai;
                 return view('pages.theloai', compact('dsTinTheoTL', 'tenTheLoai'));
            } else {
                return redirect()->route('trangchu')->with('thongbao', 'Thể loại không tồn tại');
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

      public function danhSachVideo()
    {
        $dsVideo =$this->video->DanhsachVideo();

        return view('pages.danhsachvideo', compact('dsVideo'));
    }
}