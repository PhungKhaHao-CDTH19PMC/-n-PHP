<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\ThamGia;

class LopController extends Controller
{
    public function layDanhSach()
    {
        $lop=Lop::where('tai_khoan_id',auth()->user()->id)->get();
        if($lop==null)
         {
             return "Không tìm thấy lớp học phần";
         }
        return view('giao-vien/danh-sach-lop-day',compact('lop'));
    }

    public function layTatCaLop()
    {
        $lop=Lop::all();
        if($lop==null)
         {
             return "Không tìm thấy lớp học phần";
         }
        return view('quan-tri-vien/danh-sach-lop',compact('lop'));
    }
    
    public function themLop()
    {
        return view('giao-vien/them-lop');
    }

    public function xuLyThemLop(Request $request)
    {
        $l= new Lop();
        $l->tai_khoan_id=auth()->user()->id;
        $l->ten_lop=$request->ten_lop;
        $l->ma_lop=$request->ma_lop;
        $l->hinh_anh=$request->hinh_anh;
        $dsl=Lop::where('ma_lop',$request->ma_lop)->first();
        if(empty($dsl))
        {
            $l->save();
            return redirect()->route('ds-lop-day');
        }
        return back()->withErrors(['failed'=>"Mã lớp đã tồn tại"]);
    }
    public function chiTietLop($id)
    {
         $lop=Lop::find($id);
         if($lop==null)
         {
             return "Không tìm thấy lớp học phần";
         }
         return view('giao-vien/chi-tiet-lop', compact('lop'));
    }
    public function formCapNhatLop($id)
    {
        $lop=Lop::find($id);
        if($lop==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy lớp này"]);
        }
        return view('giao-vien/cap-nhat-lop', compact('lop'));
            
    }
    public function capNhatLop(request $req,$id)
    {
        $lop=Lop::find($id);
        if($lop==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy lớp này"]);
        }
        $lop->ten_lop= $req->ten_lop;
        $lop->save();
        return redirect()->route('ds-lop-day');
    }
    public function formXoaLop($id)
    {
        
        $lop=Lop::find($id);
        if($lop==null)
        {
            return back()->withErrors(['failed'=>"Không tìm thấy lớp này"]);
        }
        return view('giao-vien/xoa-lop', compact('lop'));
    }
    function xoaLop($id)
    {
        $lop=Lop::find($id);
        if($lop==null)
        {
            return "Không tìm thấy lớp";
        }
        
        $tg=ThamGia::where('lop_id',$lop->id)->first();
        if(empty($tg))
        {
            $lop->delete();
            return redirect()->route('ds-lop-day');
        }
        return back()->withErrors(['failed'=>"Không thể xóa lớp này"]);
    }
    
}
