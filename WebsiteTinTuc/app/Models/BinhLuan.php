<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BinhLuan extends Model
{
    use HasFactory;

      public function DSBinhLuanTheoTin($id)
    {
        $list = DB::table('binhluan')->select('binhluan.*' ,'users.hoten as hoten', 'users.avatar as avatar')
        ->join('users', 'binhluan.id_user', '=', 'users.id')
        ->where('id_tintuc', '=', $id)->get();
        return $list;
    }

    public function SoLuongBinhLuan($id)
    {
        $list = DB::table('binhluan')->select('*')
        ->where('id_tintuc', '=', $id)->count();
        return $list;
    }

    public function ThemBinhLuan($data){
       return DB::table('binhluan')->insert($data);  
    }
}