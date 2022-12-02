<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    private $users;

    public function __construct()
    {
        $this->users = new User();
    }

    public function index()
    {
        return view('admin.home');
    }

    public function thongTinNguoiDung()
    {    
        $id = Auth::user()->id;

        if(!empty($id)){
            $chitietUser = $this->users->ChiTietUser($id);
            if(!empty($chitietUser[0])){
                $chitietUser = $chitietUser[0];
                  return view('admin.thongtin',compact('chitietUser'));
            } else {
                return redirect()->route('users.index')->with('thongbao', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('thongbao', 'Liên kết không tồn tại');
        }

    }

    public function post_thongTinNguoiDung(Request $request){

        $id = Auth::user()->id;

        $request->validate([
             'hoten' => 'required',
        ],[
            'hoten.required' => 'Họ tên bắt buộc phải nhập',
        ]);

        

        $dataupdate = [
            'hoten' => $request->hoten,
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

        return back()->with('thongbao','Cập nhật thông tin người dùng thành công');
    }

    public function DoiMatKhau()
    {
        return view('admin.doimatkhau');
    }
    public function postDoiMatKhau(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Nhập sai mật khẩu hiện tại');
                    }
                }
            ],
            'password_new' => [
                'required', 'min:6', 'different:password'
            ], 
            'c_password_new' => [
                'required', 'min:6', 'same:password_new',
            ]
        ], [
            'password.required' => 'Mật khẩu hiện tại bắt buộc phải nhập',
            'password_new.required' => 'Mật khẩu hiện tại bắt buộc phải nhập',
            'password_new.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại',
            'c_password_new.same' => 'Nhập lại mật khẩu không chính xác',
            'c_password_new.required' => 'Mật khẩu hiện tại bắt buộc phải nhập',
            'password_new.min' => 'Trên 6 ký tự',
            'c_password_new.min' => 'Trên 6 ký tự',
        ]);
        $id = Auth::user()->id;
        $mk_moi = Hash::make($request->password_new);
        
        $dataupdate = [
            'password' => $mk_moi,
            'updated_at' => date('Y-m-d H:i:s')
        ];

  
        $user = new User();

        $user->CapNhatUser($id, $dataupdate);

        return back()->with('thongbao', 'Đổi mật khẩu thành công');
    }
}