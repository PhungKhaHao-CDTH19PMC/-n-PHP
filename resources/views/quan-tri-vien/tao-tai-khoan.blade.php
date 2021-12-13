@extends('quan-tri-vien.main')

@section('main-content')
<div id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div id="titlecontact">
          <h2>Cập nhật tài khoản</h2>
        </div>
        <div id="sendmessage">Your message has been sent. Thank you!</div>
        <div id="errormessage"></div>
        <form action="{{ route('xl-tao-tai-khoan')}}" method="post" role="form" class="contactForm">
          @csrf
          <div class="col-md-6 col-sm-6 col-xs-12 left">
          @error('failed')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
            <div class="form-group">
              <select class="form-control" name="phan_quyen">
                  @foreach($dsquyen as $ds)
                  <option value="{{ $ds->id}}">{{ $ds->loai_nguoi_dung}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <input type="text" name="username" class="form-control form" placeholder="Userame" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control form" placeholder="Password" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  name="ho_ten" placeholder="Họ tên" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="date" class="form-control" name="ngay_sinh" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="email" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="sdt" placeholder="sdt" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="file" class="form-control" name="hinh_anh" required/>
              <div class="validation"></div>
            </div>
          </div>
          <div class="col-xs-12">
            <button type="submit"class="form contact-form-button light-form-button oswald light">Tạo</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection