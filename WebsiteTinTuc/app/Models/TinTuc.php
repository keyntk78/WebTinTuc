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

    
    public function CapNhatTinTuc($id,$data)
    {
    
        return  DB::table('tintuc')->where('id', '=', $id)->update($data);
    }

    public function XoaTinTuc($id){
        return DB::table('tintuc')->delete($id);
     }

     // Chi tiết tin tức theo id
     public function ChiTietTintuc($id){
         $chittiet = DB::table('tintuc')->select('*')->where('id', '=', $id)->get();
         return $chittiet;
     }

     // láy danh sách tin tức theo loại tin
    public function DanhSachLoaiTin($per_page = null){
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


    // Top 4 tin tức nổi bật mới nhất
    public function TinNoiBat(){
        $list = DB::table('tintuc')
        ->select('tintuc.*', 'loaitin.tenloaitin as tenloaitin',  'loaitin.tenkhongdau as tenkhongdau' )
        ->join('loaitin', 'tintuc.id_loaitin', '=', 'loaitin.id')
        ->where('tintuc.noibat', '=', 1)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();
        return $list;
    }

    // Lấy 6 tin tức mới nhất
    public function MoiNhat(){
        
        $list = DB::table('tintuc')
        ->select('tintuc.*', 'loaitin.tenloaitin as tenloaitin', 'loaitin.tenkhongdau as tenkhongdau' )
        ->join('loaitin', 'tintuc.id_loaitin', '=', 'loaitin.id')
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();
        return $list;
    }

    // lấy 4 tin theo thể loại id
    public function DanhSachTinTheoTheLoai_4($id){
        
        $list = DB::table('tintuc')
        ->select('tintuc.*', 'loaitin.tenloaitin as tenloaitin','loaitin.tenkhongdau as tenkhongdau' )
        ->join('loaitin', 'tintuc.id_loaitin', '=', 'loaitin.id')
        ->where('loaitin.id_theloai' ,'=', $id)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();
        return $list;
    }

    // Danh sách tin tức theo thể loại
    public function DanhSachTinTheoTheLoai($id, $per_page = null){

        $list = DB::table('tintuc')
        ->select('tintuc.*', 'loaitin.tenloaitin as tenloaitin', 'loaitin.tenkhongdau as tenkhongdau' )
        ->join('loaitin', 'tintuc.id_loaitin', '=', 'loaitin.id')
        ->where('loaitin.id_theloai' ,'=', $id)
        ->orderBy('created_at', 'desc');
                
        if (!empty($per_page)) {
                    $list = $list->paginate($per_page);
                } else {
                    $list = $list->get();
                }
        return $list;
    }

     // Danh sách tin tức theo thể loại
    public function DanhSachTinTheoLoaiTin($id, $per_page = null){

        $list = DB::table('tintuc')
        ->select('tintuc.*', 'loaitin.tenloaitin as tenloaitin')
        ->join('loaitin', 'tintuc.id_loaitin', '=', 'loaitin.id')
        ->where('loaitin.id' ,'=', $id)
        ->orderBy('created_at', 'desc');
                
        if (!empty($per_page)) {
                    $list = $list->paginate($per_page);
                } else {
                    $list = $list->get();
                }
        return $list;
    }

    // Lấy thông tin tin tức có loại tin theo id
    public function ChietTietTinTucPage($id){
        
        $chitiet = DB::table('tintuc')
        ->select('tintuc.*', 'loaitin.tenloaitin as tenloaitin', 'loaitin.tenkhongdau as tenkhongdau' )
        ->join('loaitin', 'tintuc.id_loaitin', '=', 'loaitin.id')
        ->where('tintuc.id' ,'=', $id)
        ->get();
        return $chitiet;
    }


     // tìm kiếm tin tức theo từ khóa (tiêu đề tin tức, thể loại, tên loại tin)
    public function getAllTimKiem($keyword, $per_page = null){
       $list = DB::table('tintuc')
        ->select('tintuc.*', 'loaitin.tenloaitin as tenloaitin', 'loaitin.tenkhongdau as tenkhongdau' )
        ->join('loaitin', 'tintuc.id_loaitin', '=', 'loaitin.id')
        ->join('theloai', 'loaitin.id_theloai', '=', 'theloai.id')
        ->orderBy('created_at', 'desc');
        
        if (!empty($keyword)) {
            $deltail = $list->where(function($query) use ($keyword) {
                $query->orwhere('tintuc.tieude', 'like', '%'.$keyword.'%');
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
}