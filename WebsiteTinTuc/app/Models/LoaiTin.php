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
}
