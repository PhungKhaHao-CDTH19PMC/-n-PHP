
@extends('quan-tri-vien.main')

@section('main-content')
<div id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div id="titlecontact">
        <div id="titlecontact">
        <h3>Danh sách tài khoản:</h3>
          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                @forelse($ds as $ds)
                <tr>
                    <td>{{ $ds->id}}</td>
                    <td>{{ $ds->ho_ten}}</td>
                    <td>{{ $ds->ngay_sinh}}</td>
                    <td>{{ $ds->email}}</td>
                    <td>{{ $ds->sdt}}</td>
                    <td>{{ $ds->phanQuyen->loai_nguoi_dung}}</td>
                    <td><a href="{{route('cap-nhat-tai-khoan-qtv',['id' => $ds->id])}}">Cập nhật</a></td>
                    <td><a href="{{route('xoa-tai-khoan',['id' => $ds->id])}}">Xóa</a></td>                  
                </tr>
                @empty
                <tr>
                    <td colspan="2">Không có dữ liệu</td>
                </tr>
                @endforelse
                </tbody>
              </table>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection