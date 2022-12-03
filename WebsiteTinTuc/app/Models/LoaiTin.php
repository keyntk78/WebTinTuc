<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoaiTin extends Model
{
    
    use HasFactory;
    // lấy danh sách loại tin có tìm kiếm
    public function DanhSachLoaiTin($filters = [], $keyword = null,$per_page = null){
        $list = DB::table('loaitin')
        ->select('loaitin.*', 'theloai.tentheloai as tentheloai')
        ->join('theloai', 'loaitin.id_theloai', '=', 'theloai.id')
         ->orderBy('loaitin.updated_at', 'DESC');

        if (!empty($filters)) {
            $list = $list->where($filters);
        }

        if (!empty($keyword)) {
            $list = $list->where(function($query) use ($keyword) {
                $query->orwhere('loaitin.tenloaitin', 'like', '%'.$keyword.'%');
                $query->orwhere('theloai.tentheloai', 'like', '%'.$keyword.'%');
            });
        }

        if (!empty($per_page)) {
            $list = $list->paginate($per_page);
        } else {
            $list = $list->get();
        }
        return $list;
    }

    // lấy danh sach loại tin 
    public function DanhSachALLLoaiTin(){
        $list = DB::table('loaitin')->get();
        return $list;
    }

    // Thêm loại tin
    public function ThemLoaiTin($data){
        return DB::table('loaitin')->insert($data);  
     }

    
    // láy thông tin chi tiết loại tin
    public function ChiTietLoaitin($id){
        $chittiet = DB::table('loaitin')->select('*')->where('id', '=', $id)->get();

        return $chittiet;
    }

    // cập nhật loại tin
    public function CapNhatloaitin($id,$data){
    
        return  DB::table('loaitin')->where('id', '=', $id)->update($data);
    }

    // xóa loại tin
    public function Xoaloaitin($id){
        return  DB::table('loaitin')->where('id', '=', $id)->delete();
    }

}