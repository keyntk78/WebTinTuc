<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\PageControllers;
use App\Http\Controllers\BaiTapController;



// Phần admin

Route::get('/admin-dangnhap', [UserController::class, 'getDangNhapAdmin'])->name('dangnhapadmin');
Route::post('/admin-dangnhap', [UserController::class, 'postDangNhapAdmin'])->name('dangnhapadmin');;

Route::get('/admin-dangxuat', [UserController::class, 'getDangXuatAdmin'])->name('dangxuatadmin');;





Route::prefix('admin')->middleware('adminLogin')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    Route::get('/doimatkhau', [HomeController::class, 'DoiMatKhau'])->name('doimatkhau');
    Route::post('/doimatkhau', [HomeController::class, 'postDoiMatKhau'])->name('doimatkhau');

    Route::prefix('user')->name('users.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('them', [UserController::class, 'getThemUser'])->name('them');
        Route::post('them', [UserController::class, 'postThemUser'])->name('them');;

        Route::get('sua/{id}', [UserController::class, 'getSuaUser'])->name('edit');
        Route::post('sua/{id}', [UserController::class, 'postSuaUser'])->name('post-edit');

        Route::get('xoa/{id}', [UserController::class, 'deleteUser'])->name('delete');
    });


    Route::prefix('theloai')->name('theloai.')->group(function(){
        Route::get('/', [TheLoaiController::class, 'index'])->name('index');

        Route::get('them', [TheLoaiController::class, 'getThemTheLoai'])->name('them');
        Route::post('them', [TheLoaiController::class, 'postThemTheLoai'])->name('them');;

        Route::get('sua/{id}', [TheLoaiController::class, 'getSuaTheLoai'])->name('sua');
        Route::post('sua/{id}', [TheLoaiController::class, 'postSuaTheLoai'])->name('post-edit');

        Route::get('xoa/{id}', [TheLoaiController::class, 'deleteTheLoai'])->name('xoa');
    });


     Route::prefix('loaitin')->name('loaitin.')->group(function(){
        Route::get('/', [LoaiTinController::class, 'index'])->name('index');

        Route::get('them', [LoaiTinController::class, 'getThemLoaiTin'])->name('them');
        Route::post('them', [LoaiTinController::class, 'postThemLoaiTin'])->name('them');;

        Route::get('sua/{id}', [LoaiTinController::class, 'getSuaLoaiTin'])->name('sua');
        Route::post('sua/{id}', [LoaiTinController::class, 'postSuaLoaiTin'])->name('post-edit');

        Route::get('xoa/{id}', [LoaiTinController::class, 'deleteLoaiTin'])->name('xoa');
    });


     Route::prefix('tintuc')->name('tintuc.')->group(function(){
        Route::get('/', [TinTucController::class, 'index'])->name('index');

        Route::get('them', [TinTucController::class, 'getThemTinTuc'])->name('them');
        Route::post('them', [TinTucController::class, 'postThemTinTuc'])->name('them');;

        Route::get('sua/{id}', [TinTucController::class, 'getSuaTinTuc'])->name('sua');
        Route::post('sua/{id}', [TinTucController::class, 'postSuaTinTuc'])->name('post-edit');

        Route::get('xoa/{id}', [TinTucController::class, 'deleteTinTuc'])->name('xoa');
    });


      Route::prefix('binhluan')->name('binhluan.')->group(function(){
        Route::get('/', [BinhLuanController::class, 'index'])->name('index');

        Route::get('xoa/{id}', [BinhLuanController::class, 'deleteBinhLuan'])->name('delete');
    });

});

// phần page
Route::get('/', [PageControllers::class, 'index'])->name('trangchu');
Route::get('/trangchu', [PageControllers::class, 'index'])->name('trangchu');
Route::get('/tintuc/{id}/{tieudekhongdau}', [PageControllers::class, 'ChiTietTinTuc'])->name('chitiettintuc');


Route::get('/dangnhap', [PageControllers::class, 'dangnhap'])->name('dangnhap');
Route::get('/dangxuat', [PageControllers::class, 'dangxuat'])->name('dangxuat');
Route::post('/dangnhap', [PageControllers::class, 'postDangNhap'])->name('dangnhap');
Route::get('/dangky', [PageControllers::class, 'getDangKy'])->name('dangky');
Route::post('/dangky', [PageControllers::class, 'postDangKy'])->name('dangky');


// bài tập
Route::prefix('bai-tap')->name('baitap.')->group(function(){
    Route::get('/', [BaiTapController::class, 'index'])->name('danhsach');
    //bài tập 1
    Route::get('/form/baitap1', [BaiTapController::class, 'form_BaiTap1'])->name('form_bt1');
    Route::post('/form/baitap1', [BaiTapController::class, 'post_form_BaiTap1'])->name('post_form_bt1');

    //bài tập 2
    Route::get('/form/baitap2', [BaiTapController::class, 'form_BaiTap2'])->name('form_bt2');
    Route::post('/form/baitap2', [BaiTapController::class, 'post_form_BaiTap2'])->name('post_form_bt2');

    //bài tập 4
    Route::get('/form/baitap4', [BaiTapController::class, 'form_BaiTap4'])->name('form_bt4');
    Route::post('/form/baitap4', [BaiTapController::class, 'post_form_BaiTap4'])->name('post_form_bt4');

    //bài tập 5
    Route::get('/form/baitap5', [BaiTapController::class, 'form_BaiTap5'])->name('form_bt5');
    Route::post('/form/baitap5', [BaiTapController::class, 'post_form_BaiTap5'])->name('post_form_bt5');
});
