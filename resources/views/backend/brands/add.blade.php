@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/brands" method="POST">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Thêm Khu Vực - Địa chỉ</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tên Khu Vực - Địa chỉ</label>
                      <input type="text" value="{{ old('brand_name') }}" name="brand_name" class="form-control">
                      @error('brand_name')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Quận</label>
                            <select class="form-control" name="brand_keyword">
                                <option value="">-- Chọn quận --</option>
                                <option value="Hà Nội">Hà Đông</option>
                                <option value="Tây Hồ">Tây Hồ</option>
                                <option value="Ba Đình">Ba Đình</option>
                                <option value="Hoàn Kiếm">Hoàn Kiếm</option>
                                <option value="Đống Đa">Đống Đa</option>
                                <option value="Đống Đa">Thanh Xuân</option>
                                <option value="Đống Đa">Cầu Giấy</option>
                            </select>
                            @error('brand_keyword')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Mô Tả</label>
                            <input type="text" value="{{ old('brand_description') }}" name="brand_description" class="form-control">
                            @error('brand_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Thêm Khu Vực - Địa chỉ</button>
          <a href="/admin/brands" class="btn btn-primary pull-right">Danh sách Khu Vực - Địa chỉ</a>
        <div class="clearfix"></div>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection
