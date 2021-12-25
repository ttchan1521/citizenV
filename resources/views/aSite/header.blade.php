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
          <a href="#" style="height: 50px!important;">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Quản lý truy cập</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Quản lý truy cập</a></li>
          <li><a href="{{ route('admin.phanquyen', ['position' => $user->position ]) }}">Danh sách {{ $down }}</a></li>
          <li><a href="{{ route('admin.lichkhaibao', ['position' => $user->position ]) }}">Lịch khai báo</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('admin.theodoi', ['position' => $user->position ]) }}" style="height: 50px!important;">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Quản lý nhập liệu</span>
          </a>
          <!-- <i class='bx bxs-chevron-down arrow' ></i> -->
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('admin.theodoi', ['position' => $user->position ]) }}">Quản lý nhập liệu</a></li>
          <!-- <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li> -->
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('admin.phantich', ['position' => $user->position ]) }}" style="height: 50px!important;">
            <i class='bx bx-line-chart' ></i>
            <span class="link_name">Phân tích dữ liệu</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('admin.phantich', ['position' => $user->position ]) }}">Phân tích dữ liệu</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('admin.dulieu', ['position' => $user->position ]) }}" style="height: 50px!important;">
            <i class='bx bxs-group'></i>
            <span class="link_name">Dữ liệu dân số</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('admin.dulieu', ['position' => $user->position ]) }}">Dữ liệu dân số</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('admin.thongbao', ['position' => $user->position ]) }}" style="height: 50px!important;">
            <i class='bx bxs-bell'></i>
            <span class="link_name">Thông báo</span>
          </a> 
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('admin.thongbao', ['position' => $user->position ]) }}">Thông báo</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('admin.input_citizen', ['position' => $user->position ]) }}" style="height: 50px!important;">
            <i class='bx bxs-contact'></i>
            <span class="link_name">Khai báo dân số</span>
          </a> 
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('admin.input_citizen', ['position' => $user->position ]) }}">Khai báo dân số</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('admin.survey', ['position' => $user->position ]) }}" style="height: 50px!important;">
            <i class='bx bxs-user-badge'></i>
            <span class="link_name">Phiếu điều tra</span>
          </a> 
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('admin.survey', ['position' => $user->position ]) }}">Phiếu điều tra</a></li>
        </ul>
      </li>
      <li>
        <div class="profile-details active">
          <div class="profile_name">Logout</div>
          <i class='bx bx-log-out' ></i>
        </div>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"> Bộ Y tế</span>
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
    
    <script src="{{ asset('js/aSite/sidebar.js')}}"></script>