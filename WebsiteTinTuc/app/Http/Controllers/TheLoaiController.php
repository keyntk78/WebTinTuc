<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;

class TheLoaiController extends Controller
{
     private $theloai;

     public function __construct()
     {
        $this->theloai = new TheLoai();
     }
     public function index(){

        $theloai = $this->theloai->DanhsachTheloai();
        return view('admin.theloai.danhsach', compact('theloai'));
    }


    public function getThemTheLoai(){
        
        return view('admin.theloai.them');
    }

     public function postThemTheLoai(Request $request){

        $request->validate([
            'tentheloai' => 'required',
        ],[
            'tentheloai.required' => 'Tên thể loại không được để trống',
        ]);

        
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
            $gethinh = time().'_theloai'.'_'.$hinh->getClientOriginalName();
            $destinationPath = public_path('uploads/images');
            $hinh->move($destinationPath, $gethinh);
        }


        $dataIsert = [
            'tentheloai' => $request->tentheloai,
            'tenkhongdau' => convert_Unsigned($request->tentheloai),
            'hinh' => $gethinh,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

        $theloai = $this->theloai->ThemTheloai($dataIsert);

        return back()->with('thongbao', 'Thêm thành công');
    }

    public function getSuaTheLoai($id = 0){

       
        if(!empty($id)){
            $chitiettheloai = $this->theloai->ChiTietTheLoai($id);  
            if(!empty($chitiettheloai[0])){
                $chitiettheloai = $chitiettheloai[0];
                 return view('admin.theloai.sua', compact('chitiettheloai'));
            } else {
                return redirect()->route('theloai.index')->with('thongbao', 'Thể loại không tồn tại');
            }
        } else {
            return redirect()->route('theloai.index')->with('thongbao', 'Liên kết không tồn tại');
        }
    }

    public function postSuaTheLoai(Request $request,$id){
        
        $request->validate([
            'tentheloai' => 'required',

       ],[
           'tentheloai.required' => 'Tên thể loại bắt buộc phải nhập',

       ]);
        $dataupdate = [
            'tentheloai' => $request->tentheloai,
            'tenkhongdau' => convert_Unsigned($request->tentheloai),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];
        $this->theloai->CapNhattheloai($id, $dataupdate);
        return back()->with('thongbao','Cập nhật thể loại thành công');
    }

     public function deleteTheLoai(){
        
        return 'xoa thanh công';
    }

}