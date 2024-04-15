<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="/" class="simple-text logo-normal">
        SportTM
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">

        <li class="nav-item @php
            if(isset($activeDashboard))
            echo $activeDashboard;
        @endphp">
          <a class="nav-link" href="admin/dashboard">
            <i class="material-icons">dashboard</i>
            <p>Thống kê</p>
          </a>
        </li>

        <li class="nav-item @php
              if(isset($activeCategory))
              echo $activeCategory;
          @endphp">
          <a class="nav-link" href="admin/categorys">
            <i class="material-icons">content_paste</i>
            <p>Loại sân</p>
          </a>
        </li>
        
        <li class="nav-item @php
              if(isset($activeBrand))
              echo $activeBrand;
          @endphp">
          <a class="nav-link" href="admin/brands">
            <i class="material-icons">content_paste</i>
            <p>Khu vực - địa điểm</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeProduct))
              echo $activeProduct;
          @endphp">
          <a class="nav-link" href="admin/products">
            <i class="material-icons">content_paste</i>
            <p>Chi tiết sân</p>
          </a>
        </li>
        @if (Auth::user()->role_id == 1)
          <li class="nav-item
            @php
            if(isset($activeUser))
            echo $activeUser;
            @endphp">
            <a class="nav-link" href="admin/users">
              <i class="material-icons">content_paste</i>
              <p>Người Dùng</p>
            </a>
          </li>
        @endif

        <li class="nav-item @php
              if(isset($activeOrder))
              echo $activeOrder;
          @endphp">
          <a class="nav-link" href="admin/orders">
            <i class="material-icons">content_paste</i>
            <p>Đơn Đặt Sân</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeSlide))
              echo $activeSlide;
          @endphp">
          <a class="nav-link" href="admin/slides">
            <i class="material-icons">content_paste</i>
            <p>Slide/Banner</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
