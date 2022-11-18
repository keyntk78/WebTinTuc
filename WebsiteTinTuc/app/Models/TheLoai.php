<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TheLoai extends Model
{
    use HasFactory;

    public function DanhsachTheloai(){
        $list = DB::table('theloai')->get();
        return $list;
    }

    public function ThemTheloai($data){
       return DB::table('theloai')->insert($data);  
    }

    public function ChiTietTheLoai($id)
    {
        $chittiet = DB::table('theloai')->select('*')->where('id', '=', $id)->get();

        return $chittiet;
    }

    public function CapNhattheloai($id,$data)
    {
    
        return  DB::table('theloai')->where('id', '=', $id)->update($data);
    }
}
