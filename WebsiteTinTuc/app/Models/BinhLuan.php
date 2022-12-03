<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BinhLuan extends Model
{
    use HasFactory;

    // Lấy danh sách bình luận
    public function DSBinhLuan($filters = [], $keyword = null,$per_page = null){
        $list = DB::table('binhluan')->select('binhluan.*' ,'users.hoten as hoten', 'tintuc.tieude as tieudetintuc')
        ->join('users', 'binhluan.id_user', '=', 'users.id')
        ->join('tintuc', 'binhluan.id_tintuc', '=', 'tintuc.id')
        ->orderBy('binhluan.updated_at', 'DESC');
        
        if (!empty($filters)) {
            $list = $list->where($filters);
        }

        if (!empty($per_page)) {
            $list = $list->paginate($per_page);
        } else {
            $list = $list->get();
        }

        return $list;
    }

    // Lấy danh sách các bình luận theo tin tức
      public function DSBinhLuanTheoTin($id){
        $list = DB::table('binhluan')->select('binhluan.*' ,'users.hoten as hoten', 'users.avatar as avatar')
        ->join('users', 'binhluan.id_user', '=', 'users.id')
        ->where('id_tintuc', '=', $id)->get();
        return $list;
    }


    // Lấy số lượng bình luận theo tin tức
    public function SoLuongBinhLuan($id){
        $list = DB::table('binhluan')->select('*')
        ->where('id_tintuc', '=', $id)->count();
        return $list;
    }

    
    // chi tiết bình luận theo ids
    public function ChiTietBinhLuan($id){
         $chittiet = DB::table('binhluan')->select('*')->where('id', '=', $id)->get();
         return $chittiet;
    }

    // xóa bình luận
    public function XoaBinhLuan($id){
        return DB::table('binhluan')->delete($id);
    }

    // thêm bình luận
    public function ThemBinhLuan($data){
       return DB::table('binhluan')->insert($data);  
    }

    // Số Lượng bình luận
    public function SLBinhLuan(){
       return DB::table('binhluan')->count();  
    }

}