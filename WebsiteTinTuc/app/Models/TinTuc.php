<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TinTuc extends Model
{
    use HasFactory;

    public function ThemTinTuc($data){
       return DB::table('tintuc')->insert($data);
    }

    public function XoaTinTuc($id){
        return DB::table('tintuc')->delete($id);
     }

     public function ChiTietTintuc($id)
     {
         $chittiet = DB::table('tintuc')->select('*')->where('id', '=', $id)->get();

         return $chittiet;
     }

    public function DanhSachLoaiTin($per_page = null)
    {
        $list = DB::table('tintuc')
        ->select('tintuc.*', 'loaitin.tenloaitin as tenloaitin')
        ->join('loaitin', 'tintuc.id_loaitin', '=', 'loaitin.id');

        if (!empty($per_page)) {
            $list = $list->paginate($per_page);
        } else {
            $list = $list->get();
        }
        return $list;
    }
}
