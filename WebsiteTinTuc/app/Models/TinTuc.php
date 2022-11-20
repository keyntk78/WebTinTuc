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
}