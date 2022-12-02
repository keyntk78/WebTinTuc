<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video;

class VideoController extends Controller
{
    private $video;
    public function __construct()
     {
        $this->video = new Video();
     }
     public function index(){

        $video = $this->video->DanhsachVideo();
        return view('admin.video.danhsach', compact('video'));
    }

    public function getThemVideo(){
        
        return view('admin.video.them');
    }

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
  
}
