
@extends('quan-tri-vien.main')

@section('main-content')
<div id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div id="titlecontact">
        <div id="titlecontact">
        <h3>Danh sách lớp học:</h3>
          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên lớp</th>
                    <th scope="col">Mã lớp</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Giáo viên</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                @forelse($lop as $ds)
                <tr>
                    <td>{{ $ds->id}}</td>
                    <td>{{ $ds->ten_lop}}</td>
                    <td>{{ $ds->ma_lop}}</td>
                    <td>{{ $ds->created_at}}</td>
                    @php
                    $gv= App\Models\TaiKhoan::find($ds->tai_khoan_id);
                    @endphp
                    <td>{{$gv->ho_ten}}</td>
                    <td><a href="{{route('chi-tiet-lop',['id' => $ds->id]) }}">Xem</a></td>           
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