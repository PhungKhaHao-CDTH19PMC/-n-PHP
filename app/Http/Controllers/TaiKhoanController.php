<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaiKhoanRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\TaiKhoan;
use App\Models\ThamGia;
use App\Models\PhanQuyen;
use App\Models\Lop;
use Illuminate\Support\Facades\Hash;

class TaiKhoanController extends Controller
{

    public function dangNhap()
    {
        return view('dang-nhap');
    }

    public function xuLyDangNhap(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if(auth()->user()->phan_quyen_id==1)
            {
                return redirect()->route('ds-lop-hoc');
            }
            elseif(auth()->user()->phan_quyen_id==2){
                return redirect()->route('ds-lop-day');
            }
            else{
                return redirect()->route('ds-lop');
            }
        }
        return back()->withErrors(['failed'=>"Vui lòng kiểm tra lại Username/password"]);
    }

    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }

    public function dangKi()
    {
        return view('dang-ki');
    }

    public function xuLyDangKi(Request $request)
    {
        $tk= new TaiKhoan();
        $tk->phan_quyen_id=1;
        $tk->username=$request->username;
        $tk->password=Hash::make($request->password);
        $tk->ho_ten=$request->ho_ten;
        $tk->ngay_sinh=$request->ngay_sinh;
        $tk->email=$request->email;
        $tk->sdt=$request->sdt;
        $tk->hinh_anh=$request->hinh_anh;
        $dstk=TaiKhoan::where('username',$request->username)->first();
        if(empty($dstk))
        {
            $kte=TaiKhoan::where('email',$request->email)->first();
            if(empty($kte))
            {
                $tk->save();
                return back()->withErrors(['failed'=>"Đăng kí thành công"]);
            }
            return back()->withErrors(['failed'=>"Email đã tồn tại"]);
        }
        return back()->withErrors(['failed'=>"Tên đăng nhập đã tồn tại"]);
    }

    public function formCapNhatTaiKhoan($id)
    {
        $tk=TaiKhoan::find($id);
        if($tk==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy tài khoản này"]);
        }
        if(auth()->user()->phan_quyen_id==1)
        {
            return view('sinh-vien/cap-nhat-tai-khoan', compact('tk'));
        }
        elseif(auth()->user()->phan_quyen_id==2){
            return view('giao-vien/cap-nhat-tai-khoan', compact('tk'));
        }
        else{
            return view('quan-tri-vien/cap-nhat-tai-khoan', compact('tk'));
        }
            
    }
    public function capNhatTaiKhoan(request $req,$id)
    {
        $tk=TaiKhoan::find($id);
        if($tk==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy tài khoản này"]);
        }
        $tk->ho_ten= $req->ho_ten;
        $tk->ngay_sinh= $req->ngay_sinh;
        $tk->email= $req->email;
        $tk->sdt= $req->sdt;
        $tk->save();
        return back()->withErrors(['failed'=>"Cập nhật thành công"]);
    }
    
    public function dsLopHoc()
    {
        $sinhVien=TaiKhoan::find(auth()->user()->id);
        return view('sinh-vien/danh-sach-lop-hoc', compact('sinhVien'));
    }

    public function taoTaiKhoan()
    {
        $dsquyen= PhanQuyen::all();
        return view('quan-tri-vien/tao-tai-khoan', compact('dsquyen'));
    }

    public function xuLyTaoTaiKhoan(Request $request)
    {
        $tk= new TaiKhoan();
        $tk->phan_quyen_id=$request->phan_quyen;
        $tk->username=$request->username;
        $tk->password=Hash::make($request->password);
        $tk->ho_ten=$request->ho_ten;
        $tk->ngay_sinh=$request->ngay_sinh;
        $tk->email=$request->email;
        $tk->sdt=$request->sdt;
        $tk->hinh_anh=$request->hinh_anh;
        $dstk=TaiKhoan::where('username',$request->username)->first();
        if(empty($dstk))
        {
            $kte=TaiKhoan::where('email',$request->email)->first();
            if(empty($kte))
            {
                $tk->save();
                return back()->withErrors(['failed'=>"Đăng kí thành công"]);
            }
            return back()->withErrors(['failed'=>"Email đã tồn tại"]);
        }
        return back()->withErrors(['failed'=>"Tên đăng nhập đã tồn tại"]);
    }

    public function formDatLaiMatKhau($id)
    {
        $tk=TaiKhoan::find($id);
        if($tk==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy tài khoản này"]);
        }
        if(auth()->user()->phan_quyen_id==1)
        {
            return view('sinh-vien/dat-lai-mat-khau', compact('tk'));
        }
        elseif(auth()->user()->phan_quyen_id==2){
            return view('giao-vien/dat-lai-mat-khau', compact('tk'));
        }
        else{
            return view('quan-tri-vien/dat-lai-mat-khau', compact('tk'));
        }
            
    }
    public function datLaiMatKhau(request $req,$id)
    {
        $tk=TaiKhoan::find($id);
        if($tk==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy tài khoản này"]);
        }
        if(!Hash::check($req->password,auth()->user()->password))
        {
            return back()->withErrors(['failed'=>"Mật khẩu sai! Hãy nhập lại"]);
        }
        elseif($req->mat_khau_moi!=$req->nhap_lai)
        {
            return back()->withErrors(['failed'=>"Mật khẩu không trùng khớp! Hãy nhập lại"]);
        }
        $tk->password= Hash::make($req->mat_khau_moi);
        $tk->save();
        return back()->withErrors(['failed'=>"Cập nhật mật khẩu thành công"]);
    }
    public function dsTaiKhoan()
    {
        $ds=TaiKhoan::where('id','!=', auth()->user()->id)->get();
        return view('quan-tri-vien/danh-sach-tai-khoan', compact('ds'));
    }

    public function formCapNhatTaiKhoanQtv($id)
    {
        $quyen=PhanQuyen::all();
        $tk=TaiKhoan::find($id);
        if($tk==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy tài khoản này"]);
        }
        return view('quan-tri-vien/cap-nhat-tai-khoan-qtv', compact('tk','quyen'));     
    }

    public function capNhatTaiKhoanQtv(request $req,$id)
    {
        $tk=TaiKhoan::find($id);
        if($tk==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy tài khoản này"]);
        }
        $tk->phan_quyen_id= $req->phan_quyen;
        $tk->ho_ten= $req->ho_ten;
        $tk->ngay_sinh= $req->ngay_sinh;
        $tk->email= $req->email;
        $tk->sdt= $req->sdt;
        $tk->save();
        return redirect()->route('ds-tai-khoan');
    }
    public function formXoaTaiKhoan($id)
    {
        $quyen=PhanQuyen::all();
        $tk=TaiKhoan::find($id);
        if($tk==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy tài khoản này"]);
        }
        return view('quan-tri-vien/xoa-tai-khoan', compact('tk','quyen'));     
    }

    public function xoaTaiKhoan(request $req,$id)
    {
        $tk=TaiKhoan::find($id);
        if($tk==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy tài khoản này"]);
        }
        $tg=ThamGia::where('tai_khoan_id',$tk->id)->get();
        if($tg)
        {
            $tg=ThamGia::where('tai_khoan_id',$tk->id)->delete();
        }
        $lop=Lop::where('tai_khoan_id',$tk->id)->get();
        if($lop)
        {
            $lop=Lop::where('tai_khoan_id',$tk->id)->delete();
        }
        $tk->delete();
        return redirect()->route('ds-tai-khoan');
    }
}
