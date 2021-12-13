@extends('giao-vien.main')

@section('main-content')
<div id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div id="titlecontact">
          <h2>Cập nhật tài khoản</h2>
        </div>
        <div id="sendmessage">Your message has been sent. Thank you!</br>
          <div id="errormessage"><a href="{{ route('dat-lai-mat-khau',['id' => auth()->user()->id])}}">Đặt lại mật khẩu</a></div>

        </div>
        <div id="errormessage"></div>
        <form action="{{ route('xl-cap-nhat-tai-khoan',['id' => auth()->user()->id])}}" method="post" role="form" class="contactForm">
          @csrf
          <div class="col-md-6 col-sm-6 col-xs-12 left">
          @error('failed')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" name="username" class="form-control form" placeholder="Userame" value="{{$tk->username}}" disabled />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Họ tên</label>
              <input type="text" class="form-control"  name="ho_ten" placeholder="Họ tên" value="{{$tk->ho_ten}}" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Ngày sinh</label>
              <input type="date" class="form-control" name="ngay_sinh" value="{{$tk->ngay_sinh}}" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" placeholder="email" value="{{$tk->email}}" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Số điện thoại</label>
              <input type="text" class="form-control" name="sdt" placeholder="sdt" value="{{$tk->sdt}}" required/>
              <div class="validation"></div>
            </div>
          </div>
          <div class="col-xs-12">
            <button type="submit"class="form contact-form-button light-form-button oswald light">Cập nhật</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection