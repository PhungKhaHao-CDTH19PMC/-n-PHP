<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mentor Education Bootstrap Theme</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
</head>
<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">E<span>-Learning</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ route('ds-lop')}}">Lớp Học</a></li>
          <li><a href="{{ route('cap-nhat-tai-khoan',['id' => auth()->user()->id])}}">Thông tin tài khoản</a></li>
          <li><a href="{{ route('tao-tai-khoan')}}">Tạo tài khoản</a></li>
          <li><a href="{{ route('ds-tai-khoan')}}">Danh sách tài khoản</a></li>
          <li class="btn-trial"><a href="{{ route('dang-xuat')}}">Đăng xuất</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-text text-center">
            <div class="text-border">
              <h2 class="text-dec">Trust & Quality</h2>
            </div>
            <div class="intro-para text-center quote">
              <p class="big-text">Learning Today . . . Leading Tomorrow.</p>
              <p class="small-text">“Học tập là hạt giống của kiến thức, kiến thức là hạt giống của hạnh phúc.”</br> Ngạn ngữ Gruzia</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="main_content">
    @yield('main-content')
  </div>
  <footer id="footer" class="footer">
    <div class="container text-center">
      <h3>Start Your Free Trial Now!</h3>
      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      ©2016 Mentor Theme. All rights reserved
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
      </div>
    </div>
  </footer>

</body>

</html>
