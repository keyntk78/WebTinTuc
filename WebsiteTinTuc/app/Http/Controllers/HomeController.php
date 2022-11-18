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
    public function index()
    {
        return view('admin.home');
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