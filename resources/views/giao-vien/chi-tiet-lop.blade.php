
@extends('giao-vien.main')

@section('main-content')
<div id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div id="titlecontact">
        <div id="titlecontact">
        <h3>Lớp: {{$lop->ten_lop}}</h3>
        <h3>Mã Lớp: {{$lop->ma_lop}}</h3>
        <form action="{{route('xl-them-sinh-vien',['id' => $lop->id])}}" method="post" role="form" class="contactForm">
          @csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Thêm sinh viên</label>
              <input style="width: 300px" type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Nhập email sinh viên">
              <button type="submit" class="btn btn-primary">Thêm lớp học</button>
          </div>
          <div class="form-group">
              @error('failed')
                <div style="width: 300px" class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>
        </form>
          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($lop->chiTiet as $ds)
                <tr>
                    <td>{{ $ds->id}}</td>
                    <td>{{ $ds->ho_ten}}</td>
                    <td>{{ $ds->ngay_sinh}}</td>
                    <td>{{ $ds->email}}</td>
                    <td>{{ $ds->sdt}}</td>
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