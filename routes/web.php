<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\LopController;
use App\Http\Controllers\ThamGiaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dang-nhap');
});

Route::get('/dang-nhap',[TaiKhoanController::class, 'dangNhap'])->name('dang-nhap');
Route::post('/dang-nhap',[TaiKhoanController::class, 'xuLyDangNhap'])->name('xl-dang-nhap');
Route::get('/dang-ki',[TaiKhoanController::class, 'dangKi'])->name('dang-ki');
Route::post('/dang-ki',[TaiKhoanController::class, 'xuLyDangKi'])->name('xl-dang-ki');

Route::get('/dang-xuat',[TaiKhoanController::class, 'dangXuat'])->name('dang-xuat');

Route::middleware('auth')->group( function()
{
    Route::get('/tai-khoan/cap-nhat/{id}',[TaiKhoanController::class, 'formCapNhatTaiKhoan'])->name('cap-nhat-tai-khoan');
    Route::post('/tai_khoan/cap-nhat/{id}',[TaiKhoanController::class, 'capNhatTaiKhoan'])->name('xl-cap-nhat-tai-khoan');
    Route::get('/tai-khoan/dat-lai/{id}',[TaiKhoanController::class, 'formDatLaiMatKhau'])->name('dat-lai-mat-khau');
    Route::post('/tai_khoan/dat-lai/{id}',[TaiKhoanController::class, 'datLaiMatKhau'])->name('xl-dat-lai-mat-khau');
    

    Route::get('/danh-sach-lop-hoc',[TaiKhoanController::class, 'dsLopHoc'])->name('ds-lop-hoc');
    Route::post('/sinh-vien/them-lop',[ThamGiaController::class, 'xuLyThemLop'])->name('xl-them-lop-hoc');
    Route::get('/sinh-vien/xoa-lop-hoc/{id}',[ThamGiaController::class, 'xoaLop'])->name('xoa-lop-hoc');

    Route::get('/danh-sach-lop-day',[LopController::class, 'layDanhSach'])->name('ds-lop-day');
    Route::get('/giao-vien/them-lop',[LopController::class, 'themLop'])->name('them-lop');
    Route::post('/giao-vien/them-lop',[LopController::class, 'xuLyThemLop'])->name('xl-them-lop-day');
    Route::get('/chi-tiet-lop/{id}',[LopController::class, 'chiTietLop'])->name('chi-tiet-lop');
    Route::get('/lop/cap-nhat/{id}',[LopController::class, 'formCapNhatLop'])->name('cap-nhat-lop');
    Route::post('/lop/cap-nhat/{id}',[LopController::class, 'capNhatLop'])->name('xl-cap-nhat-lop');
    Route::get('/lop/xoa/{id}',[LopController::class, 'formXoaLop'])->name('xoa-lop');
    Route::post('/lop/xoa/{id}',[LopController::class, 'xoaLop'])->name('xl-xoa-lop');
    Route::post('/giao-vien/them-sinh-vien/{id}',[ThamGiaController::class, 'xuLyThemHocSinh'])->name('xl-them-sinh-vien');

    Route::get('/danh-sach-lop',[LopController::class, 'layTatCaLop'])->name('ds-lop');
    Route::get('/tao-tai-khoan',[TaiKhoanController::class, 'taoTaiKhoan'])->name('tao-tai-khoan');
    Route::post('/tao-tai-khoan',[TaiKhoanController::class, 'xuLyTaoTaiKhoan'])->name('xl-tao-tai-khoan');
    Route::get('/danh-sach-tai-khoan',[TaiKhoanController::class, 'dsTaiKhoan'])->name('ds-tai-khoan');
    Route::get('/tai-khoan-qtv/cap-nhat/{id}',[TaiKhoanController::class, 'formCapNhatTaiKhoanQtv'])->name('cap-nhat-tai-khoan-qtv');
    Route::post('/tai_khoan-qtv/cap-nhat/{id}',[TaiKhoanController::class, 'capNhatTaiKhoanQtv'])->name('xl-cap-nhat-tai-khoan-qtv');
    Route::get('/tai-khoan-qtv/xoa/{id}',[TaiKhoanController::class, 'formXoaTaiKhoan'])->name('xoa-tai-khoan');
    Route::post('/tai_khoan-qtv/xoa/{id}',[TaiKhoanController::class, 'xoaTaiKhoan'])->name('xl-xoa-tai-khoan');
});

