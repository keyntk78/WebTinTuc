<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoaiTin extends Model
{
    
    use HasFactory;
    public function DanhSachLoaiTin()
    {
        $list = DB::table('loaitin')
        ->select('loaitin.*', 'theloai.tentheloai as tentheloai')
        ->join('theloai', 'loaitin.id_theloai', '=', 'theloai.id')
        ->get();
        return $list;
    }
    public function ThemLoaiTin($data){
        return DB::table('loaitin')->insert($data);  
     }

    public function ChiTietLoaitin($id)
    {
        $chittiet = DB::table('loaitin')->select('*')->where('id', '=', $id)->get();

        return $chittiet;
    }

    public function CapNhatloaitin($id,$data)
    {
    
        return  DB::table('loaitin')->where('id', '=', $id)->update($data);
    }

    public function Xoaloaitin($id)
    {
        return  DB::table('loaitin')->where('id', '=', $id)->delete();
    }

}
