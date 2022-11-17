<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    public function DanhsachTheloai(){
        $list = DB::table('theloai')->get();
        return $list;
    }


}
