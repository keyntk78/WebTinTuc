<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    use HasFactory;

    public function DanhsachVideo(){
        $list = DB::table('video')->get();
        return $list;
    }

    
}