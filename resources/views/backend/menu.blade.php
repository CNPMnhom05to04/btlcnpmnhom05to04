<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="/" class="simple-text logo-normal">
        TEA TAM
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
              <i class="fa-solid fa-bars"></i>
              <p>Loại Sản Phẩm</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeBrand))
              echo $activeBrand;
          @endphp">
          <a class="nav-link" href="admin/brands">
              <i class="fa-solid fa-certificate"></i>
              <p>Phân Loại Khối Lượng</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeProduct))
              echo $activeProduct;
          @endphp">
          <a class="nav-link" href="admin/products">
              <i class="fa-solid fa-store"></i>
            <p>Sản Phẩm</p>
          </a>
        </li>
          <li class="nav-item @php
              if(isset($activePost))
              echo $activePost;
          @endphp">
        @if (Auth::user()->role_id == 1)
          <li class="nav-item
            @php
            if(isset($activeUser))
            echo $activeUser;
            @endphp">
            <a class="nav-link" href="admin/users">
                <i class="fa-solid fa-user"></i>
              <p>Người Dùng</p>
            </a>
          </li>
        @endif

        <li class="nav-item @php
              if(isset($activeOrder))
              echo $activeOrder;
          @endphp">
          <a class="nav-link" href="admin/orders">
              <i class="fa-solid fa-money-bills"></i>
            <p>Hóa Đơn</p>
          </a>
        </li>

          <li class="nav-item @php
              if(isset($activeChat))
              echo $activeChat;
          @endphp">
              <a class="nav-link" href="/chat">
                  <i class="fa-brands fa-facebook-messenger"></i>
                  <p>Tin nhắn</p>
              </a>
          </li>
          <li class="nav-item @php
              if(isset($activeShip))
              echo $activeShip;
          @endphp">
              <a class="nav-link" href="admin/ships">
                  <i class="fa-solid fa-truck-fast"></i>
                  <p>Phí Vận Chuyển</p>
              </a>
          </li>
          <li class="nav-item @php
              if(isset($activeCoupon))
              echo $activeCoupon;
          @endphp">
              <a class="nav-link" href="admin/coupons">
                  <i class="fa-solid fa-ticket"></i>
                  <p>Mã Giảm Giá</p>
              </a>
          </li>
          <li class="nav-item @php
              if(isset($activeSlide))
              echo $activeSlide;
          @endphp">
              <a class="nav-link" href="admin/slides">
                  <i class="fa-solid fa-image"></i>
                  <p>Slide/Banner</p>
              </a>
          </li>
          <li class="nav-item @php
              if(isset($activePost))
              echo $activePost;
          @endphp">
              <a class="nav-link" href="admin/posts">
                  <i class="fa-solid fa-feather"></i>
                  <p>Bài Viết</p>
              </a>
          </li>
        <li class="nav-item @php
              if(isset($activeComment))
              echo $activeComment;
          @endphp">
          <a class="nav-link" href="admin/comments">
              <i class="fa-solid fa-comments"></i>
            <p>Bình Luận</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeRequirement))
              echo $activeRequirement;
          @endphp">
          <a class="nav-link" href="admin/requirements">
              <i class="fa-solid fa-paper-plane"></i>
            <p>Lời Nhắn</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
