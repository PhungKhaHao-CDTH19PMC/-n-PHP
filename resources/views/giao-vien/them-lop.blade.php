@extends('giao-vien.main')

@section('main-content')
<div id="contact" class="section-padding">
    <div class="container">
    
      <div class="row">
        <div id="titlecontact">
          <h2>Thêm lớp</h2>
        </div>
        <div id="sendmessage">Your message has been sent. Thank you!</div>
        <div id="errormessage"></div>
        <form action="{{route('xl-them-lop-day')}}" method="post" role="form" class="contactForm">
          @csrf
          
          <div class="col-md-6 col-sm-6 col-xs-12 left">
          @error('failed')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
            <div class="form-group">
              <input type="text" name="ten_lop" class="form-control form" placeholder="Tên lớp" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  id="random-value" name="ma_lop" placeholder="Mã lớp" required />
              <button onclick="random();" id=>Tạo mã</button>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="file" class="form-control" name="hinh_anh" required/>
              <div class="validation"></div>
            </div>
          </div>
          <div class="col-xs-12">
            <button type="submit"class="form contact-form-button light-form-button oswald light">Thêm</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection