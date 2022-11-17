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
        $list = DB::table('loaitin')->get();

        return $list;
    }

}
