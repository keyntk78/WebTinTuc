<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    use HasFactory;

    // Lấy thông tin danh sách video
    public function DanhsachVideo($keyword = null, $per_page = null){
        $list = DB::table('video')
        ->orderBy('video.updated_at', 'DESC');

        if (!empty($keyword)) {
            $list = $list->where(function($query) use ($keyword) {
                $query->orwhere('video.tieude', 'like', '%'.$keyword.'%');
            });
        }
        
        if (!empty($per_page)) {
                    $list = $list->paginate($per_page);
                } else {
                    $list = $list->get();
                }
                
        return $list;
    }

      // Lấy thông tin danh sách video
    public function DanhsachVideoPage($per_page = null){
        $list = DB::table('video')
        ->orderBy('video.updated_at', 'DESC');
        
        if (!empty($per_page)) {
                    $list = $list->paginate($per_page);
                } else {
                    $list = $list->get();
                }
                
        return $list;
    }
    
    // Thêm video
    public function ThemVideo($data){
        return DB::table('video')->insert($data);  
    }
    
    // lấy thông tin chi tiết video theo id
    public function ChiTietVideo($id){
        $chittiet = DB::table('video')->select('*')->where('id', '=', $id)->get();

        return $chittiet;
    }

    // cập nhật video
    public function CapNhatVideo($id,$data){
    
        return  DB::table('video')->where('id', '=', $id)->update($data);
    }

    // xóa video
    public function XoaVideo($id){
        return DB::table('video')->delete($id);
    }

    //Số lượng video
    public function SoLuongVideo(){
        return  DB::table('video')
        ->select('*')->count();
    }
  
}