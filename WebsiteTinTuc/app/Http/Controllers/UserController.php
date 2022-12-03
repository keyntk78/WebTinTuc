<?php

namespace App\Http\Controllers;

use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    private $users;
    const _PER_PAGE = 10;

    // phương thức khởi tạo
    public function __construct(){
        $this->users = new User();
    }

    // hiển thị form đăng nhập admin
    public function getDangNhapAdmin(){

        return view('admin.dangnhapadmin');
    }

    // xử ý đăng nhập admin
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

    // xử lý đăng xuất admin
    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect(route('dangnhapadmin'));
    }


    // Danh sách users
    public function index(Request $request){

        $filters =[];
        $keyword = null;

        if (!empty($request->quyen)) {
            $quyen = $request->quyen;
            
            $filters[] = ['users.quyen', '=', $quyen];
        }

        if (!empty($request->keywords)) {
            $keyword = $request->keywords;
        }

        $user =  $this->users->DanhSachUser($filters, $keyword,self:: _PER_PAGE);

        return view('admin.users.danhsach', compact('user'));
    }

    // hiển thị form thêm
    public function getThemUser(){

        return view('admin.users.them');
    }

    // xử lý thêm user
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
            'quyen' => 2,
            'avatar' => 'user.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

        $this->users->dangky($dataIsert);
        // dd($dataIsert);

        return back()->with('thongbao', 'Đăng ký thành công');
    }

    // hiển thị form sửa user
    public function getSuaUser($id = 0){

        if(!empty($id)){
            $chitietUser = $this->users->ChiTietUser($id);
            if(!empty($chitietUser[0])){
                $chitietUser = $chitietUser[0];
                 return view('admin.users.sua', compact('chitietUser'));
            } else {
                return redirect()->route('users.index')->with('thongbao', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('thongbao', 'Liên kết không tồn tại');
        }

    }

    // xử lý sử user
    public function postSuaUser(Request $request,$id){

        $request->validate([
             'hoten' => 'required',
        ],[
            'hoten.required' => 'Họ tên bắt buộc phải nhập',
        ]);

        

        $dataupdate = [
            'hoten' => $request->hoten,
            'quyen' => $request->quyen,
            'updated_at' =>date('Y-m-d H:i:s'),
        ];


        
        $gethinh = '';

        
        if($request->hasFile('hinh')){
            //Hàm kiểm tra dữ liệu
            $this->validate($request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'hinh' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'hinh.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'hinh.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            //Lưu hình ảnh vào thư mục public/upload/hinhthe
            $hinh = $request->file('hinh');
            $gethinh = time().'_avatar'.'_'.$hinh->getClientOriginalName();
            $destinationPath = public_path('uploads/images');
            $hinh->move($destinationPath, $gethinh);

            $dataupdate = $dataupdate + ['avatar' => $gethinh];
        }

        $this->users->CapNhatUser($id, $dataupdate);

        return back()->with('thongbao','Cập nhật người dùng thành công');
    }

    // xử lý xóa user
    public function deleteUser($id){

        if(!empty($id)){
            $chitietUser = $this->users->ChiTietUser($id);
            if(!empty($chitietUser[0])){

                $this->users->XoaUser($id);

                 return redirect()->route('users.index')->with('thongbao', 'Xóa người dùng thành công');
            } else {
                return redirect()->route('users.index')->with('thongbao', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('thongbao', 'Liên kết không tồn tại');
        }
    }

}