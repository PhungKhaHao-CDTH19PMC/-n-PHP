@extends('giao-vien.main')

@section('main-content')
<div id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div id="titlecontact">
          <h2>Cập nhật lớp</h2>
        </div>
        <div id="sendmessage">Your message has been sent. Thank you!</div>
        <div id="errormessage"></div>
        <form action="{{ route('xl-cap-nhat-lop',['id' => $lop->id])}}" method="post" role="form" class="contactForm">
          @csrf
          <div class="col-md-6 col-sm-6 col-xs-12 left">
          @error('failed')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
            <div class="form-group">
              <label for="exampleInputEmail1">Tên lớp</label>
              <input type="text" name="ten_lop" class="form-control form"value="{{$lop->ten_lop}}" required/>
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