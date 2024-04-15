@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header">
            <h3 class="card-title">Người dùng: {{ $dataShow[0] }} 
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="admin/users">Quản lý người dùng</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header">
            <h3 class="card-title">Số sân hiện có: {{$dataShow[1]}}
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="admin/products">Quản lý sân đăng</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header">
            <h3 class="card-title">Số sân được thuê: {{$dataShow[2]}}
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="admin/orders">Quản lý sân thuê</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header">
            <h3 class="card-title">Bài viết : {{$dataShow[3]}}
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="admin/posts">Quản lý bài viết</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>
@endsection

@section('script')

@endsection
