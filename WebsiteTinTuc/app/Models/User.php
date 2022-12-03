<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Đăng ký
    public function dangky($data){
        return DB::table('users')->insert($data);
    }

    // Lấy danh sách user
    public function DanhSachUser($filters = [], $keyword = null,$per_page = null){
        $list = DB::table('users')
        ->orderBy('users.updated_at', 'DESC');
        
        if (!empty($filters)) {
            $list = $list->where($filters);
        }

        if (!empty($keyword)) {
            $list = $list->where(function($query) use ($keyword) {
                $query->orwhere('hoten', 'like', '%'.$keyword.'%');
            });
        }

        if (!empty($per_page)) {
            $list = $list->paginate($per_page);
        } else {
            $list = $list->get();
        }
        return $list;
    }

    // Lấy thông tin chi tiết 1 user theo id
    public function ChiTietUser($id){
        $chittiet = DB::table('users')->select('*')->where('id', '=', $id)->get();

        return $chittiet;
    }

    // cập nhật thông tin user
    public function CapNhatUser($id,$data){
    
        return  DB::table('users')->where('id', '=', $id)->update($data);
    }

    // xóa user
    public function XoaUser($id){
        return  DB::table('users')->where('id', '=', $id)->delete();
    }

    // Lấy thông tin người dùng theo tin
    public function LayUserTheoTin($id){
        return  DB::table('users')
        ->select('*')
        ->where('id', '=', $id)->get();
    }

    // Đếm số lượng người dùng
    public function SoLuongNguoiDung(){
        return  DB::table('users')
        ->select('*')->count();
    }
}