<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TinTucController extends Controller
{
    private $tintuc;
    const _PER_PAGE = 10;

    public function __construct()
    {
        $this->tintuc = new TinTuc();

    }

    public function index(){

        $tintuc = $this->tintuc->DanhSachLoaiTin(self:: _PER_PAGE);
        return view('admin.tintuc.danhsach', compact('tintuc'));
    }


    public function getThemTinTuc(){

        return view('admin.tintuc.them');
    }

     public function postThemTinTuc(Request $request){

          $request->validate([
            'tieude' => 'required',
            'id_loaitin' => 'required',
            'tomtat' => 'required',
            'noidung' => 'required',
            'hinh' => 'required',


        ],[
            'tieude.required' => 'Tên thể loại không được để trống',
            'id_loaitin.required' => 'Phải chọn loại tin',
            'tomtat.required' => 'Tóm tắt không được để trống',
            'noidung.required' => 'Nội dung không được để trống',
            'hinh.required' => 'Hình không được để trống',
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
            $gethinh = time().'_'.$hinh->getClientOriginalName();
            $destinationPath = public_path('uploads/images');
            $hinh->move($destinationPath, $gethinh);
        }

        $dataIsert = [
            'tieude' => $request->tieude,
            'tieudekhongdau' => convert_Unsigned($request->tieude),
            'id_loaitin' => $request->id_loaitin,
            'tomtat' => $request->tomtat,
            'noidung' => $request->noidung,
            'hinh' => $gethinh,
            'noibat' =>$request->noibat,
            'id_user' => Auth::user()->id,
            'soluotxem' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

        $this->tintuc->ThemTinTuc($dataIsert);


      return back()->with('thongbao', 'Thêm thành công');
    }

    public function getSuaTinTuc($id){

           if(!empty($id)){
            $chitiettintuc = $this->tintuc->ChiTietTintuc($id);
            if(!empty($chitiettintuc[0])){
                $chitiettintuc = $chitiettintuc[0];
                 return view('admin.tintuc.sua', compact('chitiettintuc'));
            } else {
                return redirect()->route('tintuc.index')->with('thongbao', 'Tin tức  không tồn tại');
            }
        } else {
            return redirect()->route('tintuc.index')->with('thongbao', 'Liên kết không tồn tại');
        }

        return view('admin.tintuc.sua');
    }

    public function postSuaTinTuc(Request $request, $id){

         $request->validate([
            'tieude' => 'required',
            'id_loaitin' => 'required',
            'tomtat' => 'required',
            'noidung' => 'required',
        ],[
            'tieude.required' => 'Tên thể loại không được để trống',
            'id_loaitin.required' => 'Phải chọn loại tin',
            'tomtat.required' => 'Tóm tắt không được để trống',
            'noidung.required' => 'Nội dung không được để trống',
        ]);

        $dataUpdate = [
            'tieude' => $request->tieude,
            'tieudekhongdau' => convert_Unsigned($request->tieude),
            'id_loaitin' => $request->id_loaitin,
            'tomtat' => $request->tomtat,
            'noidung' => $request->noidung,
            'noibat' =>$request->noibat,
            'id_user' => Auth::user()->id,
            'soluotxem' => 0,
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
            $gethinh = time().'_'.$hinh->getClientOriginalName();
            $destinationPath = public_path('uploads/images');
            $hinh->move($destinationPath, $gethinh);

            $dataUpdate = $dataUpdate + ['hinh' => $gethinh];
        }

        $this->tintuc->CapNhatTinTuc($id, $dataUpdate);

        return back()->with('thongbao','Cập nhật tin tức thành công');
    }

     public function deleteTinTuc($id){

        if(!empty($id)){
            $chitiettintuc = $this->tintuc->ChiTietTintuc($id);
            if(!empty($chitiettintuc[0])){
                $this->tintuc->XoaTinTuc($id);
                 return redirect()->route('tintuc.index')->with('thongbao', 'Xoá tin tức thành công');
            } else {
                return redirect()->route('tintuc.index')->with('thongbao', 'Tin tức không tồn tại');
            }
        } else {
            return redirect()->route('tintuc.index')->with('thongbao', 'Liên kết không tồn tại');
        }

    }
}