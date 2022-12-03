<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use  App\Models\TheLoai;
use  App\Models\TinTuc;
use  App\Models\BinhLuan;
use App\Models\LoaiTin;
use  App\Models\Video;
use Illuminate\Support\Facades\Mail;




class PageControllers extends Controller
{
    private $users;
    private $theloai;
    private $loaitin;
    private $tintuc;
    private $binhluan;
    private $video;
    
    
    // Phương thức khởi tạo các đối tượng model
    public function __construct(){
        $this->users = new User();
        $this->theloai = new TheLoai();
        $this->loaitin = new LoaiTin();
        $this->tintuc = new TinTuc();
        $this->binhluan = new BinhLuan();
        $this->video = new Video();

    }

    // Trang chủ
    public function index(){
        $list_4 =$this->theloai->Top_4_Theloai();
        $noibat = $this->tintuc->TinNoiBat();
        $moinhat = $this->tintuc->MoiNhat();

        return view('pages.trangchu', compact('list_4', 'noibat', 'moinhat'));
    }

    // chi tiết tin tức
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

    // Chức năng bình luận
    public function postBinhLuan(Request $request, $id){
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
        
        // lấy tên tin tức
        $tentintuc = $this->tintuc->ChiTietTintuc($id)[0]->tieude;
        // lấy id người viết tin 
        $id_nguoiviettin = $this->tintuc->ChiTietTintuc($id)[0]->id_user;

        $hoten = Auth::user()->hoten;
        $data = $dataIsert + [
            'tentintuc' => $tentintuc,
            'hoten' => $hoten,
        ];

        // lấy trong tin người viết tin
        $layUserTheoTin = $this->users->LayUserTheoTin($id_nguoiviettin)[0];

        $this->binhluan->ThemBinhLuan($dataIsert);

        // Thực hiện gửi mail đến người viết bài tin tức khi người dùng bình luận
        Mail::send('pages.email.binhluan', compact('data'), function($email) use($layUserTheoTin){
            $email->subject('Bình luận');
            $email->to($layUserTheoTin->email, $layUserTheoTin->hoten);
        });

        return back();
    }

    // Tin tức theo thể loại
    public function TheLoai ($id, $tenkhongdau){

        $perpage = 6;
         if(!empty($id)){
            $dsTinTheoTL = $this->tintuc->DanhSachTinTheoTheLoai($id, $perpage);
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

    // Chức năng tìm kiếm tin tức
     public function TimKiem(Request $request){
        $keyword = null;
        $perpage = 6;
        if (!empty($request->tim_kiem)) {
            $keyword = $request->tim_kiem;
            $ketqua = $this->tintuc->getAllTimKiem($keyword, $perpage);
        } else{
            return redirect('/');
        }


        return view('pages.timkiem', compact('ketqua', 'keyword'));
    }

    // Danh sách video
    public function danhSachVideo(){

        $perpage = 6;
        $dsVideo =$this->video->DanhsachVideoPage($perpage);

        return view('pages.danhsachvideo', compact('dsVideo'));
    }

    // thontg tin thành viên
    public function thongTinThanhViien(){
        return view('pages.thongtinthanhvien');
    }

    // Hiển thị form đăng nhập
    public function dangnhap(){
        return view('pages.dangnhap');
    }

    // Xử lý đăng nhập
    public function postDangNhap(Request $request){
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

    // xử lý đăng xuất
    public function dangxuat(){
        Auth::logout();
        return redirect(route('trangchu'));
    }

    // Hiển thị form đăng ký
    public function getDangKy(){
        return view('pages.dangky');
    }

    // Xử lý đăng ký
    public function postDangKy(Request $request){
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
            'avatar' => 'user.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];


        $this->users->dangky($dataIsert);

        return redirect(route("dangnhap"))->with('thongbao', 'Đăng ký thành công');
    }

    // Thông tin  tài khoản người dùng
    public function thongTinTaiKhoan(){
         $id = Auth::user()->id;
         if(!empty($id)){
            $chitietUser = $this->users->ChiTietUser($id);
            if(!empty($chitietUser[0])){
                $chitietUser = $chitietUser[0];
                  return view('pages.thongtintaikhoan',compact('chitietUser'));
            } else {
                return redirect()->route('trangchu')->with('thongbao', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('trangchu')->with('thongbao', 'Liên kết không tồn tại');
        }
        
    }
    // Xủ lý cập nhật thông tin tài khoản
    public function postThongTinTaiKhoan(Request $request){

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

      // Đổi mật khẩu
    public function doiMatKhau(){
         
        return view('pages.doimatkhau');
    }

    public function postDoiMatKhau(Request $request){
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
      
    // Tin tức theo loại tin
   public function Loaitin ($id, $tenkhongdau){
        $perpage = 6;
         if(!empty($id)){
            $dsTinTheoLT = $this->tintuc->DanhSachTinTheoLoaiTin($id, $perpage);
            if(!empty($dsTinTheoLT[0])){
                $tenLoaiTin = $this->loaitin->ChiTietLoaitin($id)[0]->tenloaitin;
                 return view('pages.loaitin', compact('dsTinTheoLT', 'tenLoaiTin'));
            } else {
                return redirect()->route('trangchu')->with('thongbao', 'Thể loại không tồn tại');
            }
        } else {
            return redirect()->route('trangchu')->with('thongbao', 'Liên kết không tồn tại');
        }
    }


}