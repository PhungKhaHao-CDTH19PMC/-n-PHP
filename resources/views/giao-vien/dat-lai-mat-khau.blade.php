@extends('giao-vien.main')

@section('main-content')
<div id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div id="titlecontact">
          <h2>Đặt lại mật khẩu</h2>
        </div>
        <div id="sendmessage">Your message has been sent. Thank you!

        </div>
        <div id="errormessage"></div>
        <form action="{{ route('xl-dat-lai-mat-khau',['id' => auth()->user()->id])}}" method="post" role="form" class="contactForm">
          @csrf
          <div class="col-md-6 col-sm-6 col-xs-12 left">
          @error('failed')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group">
              <label for="exampleInputEmail1">Mật khẩu</label>
              <input type="password" name="password" class="form-control form" placeholder="Mật khẩu" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Mật khẩu mới</label>
              <input type="password" name="mat_khau_moi" class="form-control form" placeholder="Mật khẩu mới" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nhập lại mật khẩu mới</label>
              <input type="password" name="nhap_lai" class="form-control form" placeholder="Nhập lại mật khẩu mới"required/>
              <div class="validation"></div>
            </div>
          </div>
          <div class="col-xs-12">
            <button type="submit"class="form contact-form-button light-form-button oswald light">Đặt lại</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection