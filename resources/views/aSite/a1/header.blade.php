<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     
     <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
    </script>
    <script type = "text/javascript">
       google.charts.load('current', {packages: ['corechart','line']});  
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
    <link href="{{ asset('css/aSite/a1.css') }}" rel="stylesheet">
    <title> document </title>
</head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <!-- <i><img src="../img/logo.png" alt=""></i> -->
      <h1 class="logo">C</h1>
      <span class="logo_name">itizen</span>
    </div>
       <ul class="nav-links">
        <li>
          <div class="iocn-link">
            <a href="{{ route('aSite.phanquyen', ['position' => $user->position ]) }}" style="height: 50px!important;">
              <i class='bx bx-collection' ></i>
              <span class="link_name">Quản lý truy cập</span>
            </a>
            <!-- <i class='bx bxs-chevron-down arrow' ></i> -->
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="{{ route('aSite.phanquyen', ['position' => $user->position ]) }}">Quản lý truy cập</a></li>
            <!-- <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li> -->
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="{{ route('aSite.theodoi', ['position' => $user->position ]) }}" style="height: 50px!important;">
              <i class='bx bx-book-alt' ></i>
              <span class="link_name">Quản lý nhập liệu</span>
            </a>
            <!-- <i class='bx bxs-chevron-down arrow' ></i> -->
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="{{ route('aSite.theodoi', ['position' => $user->position ]) }}">Quản lý nhập liệu</a></li>
            <!-- <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li> -->
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="{{ route('aSite.phantich', ['position' => $user->position ]) }}" style="height: 50px!important;">
              <i class='bx bx-line-chart' ></i>
              <span class="link_name">Phân tích dữ liệu</span>
            </a>
          </div>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="{{ route('aSite.phantich', ['position' => $user->position ]) }}">Phân tích dữ liệu</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="{{ route('aSite.dulieu', ['position' => $user->position ]) }}" style="height: 50px!important;">
              <i class='bx bx-compass' ></i>
              <span class="link_name">Dữ liệu dân số</span>
            </a>
          </div>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="{{ route('aSite.dulieu', ['position' => $user->position ]) }}">Dữ liệu dân số</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="thongbao" style="height: 50px!important;">
              <i class='bx bxs-bell'></i>
              <span class="link_name">Thông báo</span>
            </a> 
          </div>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="thongbao">Thông báo</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class='bx bx-cog' ></i>
              <span class="link_name">Setting</span>
            </a>
          </div>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Setting</a></li>
          </ul>
        </li>
        <li>
      <div class="profile-details active">
        <div class="profile-content">
          <!--<img src="image/profile.jpg" alt="profileImg">-->
        </div>
        <div class="name-job ">
          <div class="profile_name">Logout</div>
        </div>
        <i class='bx bx-log-out' ></i>
      </div>
    </li>
  </ul>
    </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Tổng cục Dân số - Bộ Y tế</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <div class="notify">
          <input class="dropdown" type="checkbox" id="dropdown" name="dropdown"/>
          <a href="#" class="notification">
            <i class="fas fa-bell"></i>
            <label class="num" for="dropdown">8</label>
          </a>
          <div class="section-dropdown"> 
            <p class="top">Thông báo mới nhất</p>
            <a href="#">Thông báo 1 <i class="fas fa-ellipsis-v"></i></a>
            <a href="#">Thông báo 2 <i class="fas fa-ellipsis-v"></i></a>
            <p class="bottom"><a href="thongbao">Xem tất cả</a></p>
          </div>
        </div>
        <!--<img src="images/profile.jpg" alt="">-->
        <label class="admin_name">Xin chào admin!</label>
      </div>
    </nav>
    


