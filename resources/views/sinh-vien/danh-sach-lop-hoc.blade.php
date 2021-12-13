
@extends('sinh-vien.main')

@section('main-content')
<div id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div id="titlecontact">
        <form action="{{route('xl-them-lop-hoc')}}" method="post" role="form" class="contactForm">
          @csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Thêm lớp học</label>
              <input style="width: 300px" type="text" class="form-control" id="exampleInputEmail1" name="ma_lop" placeholder="Nhập mã lớp học">
              <button type="submit" class="btn btn-primary">Thêm lớp học</button>
          </div>
          <div class="form-group">
              @error('failed')
                <div style="width: 300px" class="alert alert-danger">{{$message}}</div>
              @enderror
          </div>
        </form>
        </div>
        <h1>Sinh viên {{$sinhVien->ho_ten}}</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên học phần</th>
                    <th scope="col">Ngày bắt đầu</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($sinhVien->dsLopHoc as $ds)
                <tr>
                    <td>{{ $ds->id}}</td>
                    <td>{{ $ds->ten_lop}}</td>
                    <td >{{ $ds->created_at}}</td>
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
@endsection