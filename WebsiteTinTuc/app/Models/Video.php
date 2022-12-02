<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    use HasFactory;

    // Lấy thông tin danh sách video
    public function DanhsachVideo($per_page = null){
        $list = DB::table('video');
        
        if (!empty($per_page)) {
                    $list = $list->paginate($per_page);
                } else {
                    $list = $list->get();
                }
                
        return $list;
    }
    
    public function ThemVideo($data){
        return DB::table('video')->insert($data);  
     }
    
     public function ChiTietVideo($id)
    {
        $chittiet = DB::table('video')->select('*')->where('id', '=', $id)->get();

        return $chittiet;
    }

    public function CapNhatVideo($id,$data)
    {
    
        return  DB::table('video')->where('id', '=', $id)->update($data);
    }

    public function XoaVideo($id){
        return DB::table('video')->delete($id);
     }
}