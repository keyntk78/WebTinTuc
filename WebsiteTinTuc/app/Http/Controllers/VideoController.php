<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video;

class VideoController extends Controller
{
    private $video;
    // phương thức khởi tạo
    public function __construct(){
        $this->video = new Video();
    }
    
    // danh sách video
    public function index(Request $request){

        $perpage = 10;
        $keyword = null;
        if (!empty($request->keywords)) {
            $keyword = $request->keywords;
        }
        
        $video = $this->video->DanhsachVideo( $keyword,$perpage);
        return view('admin.video.danhsach', compact('video'));
    }

    // hiển thị form video
    public function getThemVideo(){
        
        return view('admin.video.them');
    }

    // xử lý thêm video
    public function postThemVideo(Request $request){

        $request->validate([
            'tieude' => 'required',
            'link' => 'required',

        ],[
            'tieude.required' => 'Tên video không được để trống',
            'link.required' => 'Link không được để trống',
        ]);

        $dataIsert = [
            'tieude' => $request->tieude,
            'tieudekhongdau' => convert_Unsigned($request->tieude),
            'link' => $request->link,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

        $this->video->ThemVideo($dataIsert);
        return back()->with('thongbao', 'Thêm thành công');
    }

    //hiển thị form sửa video
    public function getSuaVideo($id = 0){
       
        if(!empty($id)){
            $chitietvideo = $this->video->ChiTietVideo($id);  
            if(!empty($chitietvideo[0])){
                $chitietvideo = $chitietvideo[0];
                 return view('admin.video.sua', compact('chitietvideo'));
            } else {
                return redirect()->route('video.index')->with('thongbao', 'Video không tồn tại');
            }
        } else {
            return redirect()->route('video.index')->with('thongbao', 'Liên kết không tồn tại');
        }
    }

    // xử  lý sửa video
    public function postSuaVideo(Request $request,$id){
        
        $request->validate([
            'tieude' => 'required',
            'link' => 'required',

        ],[
            'tieude.required' => 'Tên video không được để trống',
            'link.required' => 'Link không được để trống',
        ]);


        $dataupdate = [
            'tieude' => $request->tieude,
            'tieudekhongdau' => convert_Unsigned($request->tieude),
            'link' => $request->link,
            'updated_at' =>date('Y-m-d H:i:s'),
        ];


        $this->video->CapNhatvideo($id, $dataupdate);
        return back()->with('thongbao','Cập nhật video thành công');
    }

    //  xử xóa video
    public function deleteVideo($id){

        if(!empty($id)){
            $chitietvideo = $this->video->ChiTietVideo($id);
            if(!empty($chitietvideo[0])){
                $this->video->XoaVideo($id);
                 return redirect()->route('video.index')->with('thongbao', 'Xoá video thành công');
            } else {
                return redirect()->route('video.index')->with('thongbao', 'Video không tồn tại');
            }
        } else {
            return redirect()->route('video.index')->with('thongbao', 'Liên kết không tồn tại');
        }

    }

}