<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BinhLuan extends Model
{
    use HasFactory;

    public function DSBinhLuan()
    {
        $list = DB::table('binhluan')->select('binhluan.*' ,'users.hoten as hoten', 'tintuc.tieude as tieudetintuc')
        ->join('users', 'binhluan.id_user', '=', 'users.id')
        ->join('tintuc', 'binhluan.id_tintuc', '=', 'tintuc.id')->get();
        return $list;
    }

    // Lấy danh sách các bình luận theo tin tức
      public function DSBinhLuanTheoTin($id)
    {
        $list = DB::table('binhluan')->select('binhluan.*' ,'users.hoten as hoten', 'users.avatar as avatar')
        ->join('users', 'binhluan.id_user', '=', 'users.id')
        ->where('id_tintuc', '=', $id)->get();
        return $list;
    }


    // Lấy số lượng bình luận theo tin tức
    public function SoLuongBinhLuan($id)
    {
        $list = DB::table('binhluan')->select('*')
        ->where('id_tintuc', '=', $id)->count();
        return $list;
    }

    
     public function ChiTietBinhLuan($id)
     {
         $chittiet = DB::table('binhluan')->select('*')->where('id', '=', $id)->get();
         return $chittiet;
     }

      public function XoaBinhLuan($id){
        return DB::table('binhluan')->delete($id);
     }

    public function ThemBinhLuan($data){
       return DB::table('binhluan')->insert($data);  
    }
}