<?php

namespace App\Http\Controllers;

use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    private $users;
    
    public function __construct()
    {
        $this->users = new User();
    }
    
    public function getDangNhapAdmin(){
        
        return view('admin.dangnhapadmin');
    }

    public function postDangNhapAdmin(Request $request){
        
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
            return redirect(route('admin'));
        } else {
            return back()->with('thongbao', 'Đăng nhập không thành công: sai email hoặc mật khẩu');
        }
    }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect(route('dangnhapadmin'));
    }


    public function index(){
        
        $user =  $this->users->DanhSachUser();
        
        return view('admin.users.danhsach', compact('user'));
    }


    public function getThemUser(){
        
        return view('admin.users.them'); 
    }

     public function postThemUser(Request $request){

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
            'quyen' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];
        
        $this->users->dangky($dataIsert);
        // dd($dataIsert);

        return back()->with('thongbao', 'Đăng ký thành công');
    }

    public function getSuaUser(){
        
        return view('admin.users.sua');
    }

    public function postSuaUser(){
        
        return 'sua thanh công';
    }

     public function deleteUser(){
        
        return 'xoa thanh công';
    }

  
}