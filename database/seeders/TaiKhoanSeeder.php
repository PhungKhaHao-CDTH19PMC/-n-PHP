<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Hash;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tk= new TaiKhoan();
        $tk->phan_quyen_id=2;
        $tk->username='admin2';
        $tk->password=Hash::make('123456');
        $tk->ho_ten="adminstator";
        $tk->ngay_sinh='1900-01-01';
        $tk->email='adminstator@gmail.com';
        $tk->sdt='0123456789';
        $tk->hinh_anh='adminstator.jpg';
        $tk->save();
    }
}
