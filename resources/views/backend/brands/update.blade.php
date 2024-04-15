@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/brands/{{$data->brand_id}}" method="POST">
        @method('PATCH')
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Sửa Khu Vực - Địa chỉ</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tên Khu Vực - Địa chỉ</label>
                      <input type="text" name="brand_name" value="{{$data->brand_name}}" class="form-control">
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
                                <option value="Hà Đông" {{ old('brand_keyword', $data->brand_keyword) === 'Hà Đông' ? 'selected' : '' }}>Hà Đông</option>
                                <option value="Tây Hồ" {{ old('brand_keyword', $data->brand_keyword) === 'Tây Hồ' ? 'selected' : '' }}>Tây Hồ</option>
                                <option value="Ba Đình" {{ old('brand_keyword', $data->brand_keyword) === 'Ba Đình' ? 'selected' : '' }}>Ba Đình</option>
                                <option value="Hoàn Kiếm" {{ old('brand_keyword', $data->brand_keyword) === 'Hoàn Kiếm' ? 'selected' : '' }}>Hoàn Kiếm</option>
                                <option value="Đống Đa" {{ old('brand_keyword', $data->brand_keyword) === 'Đống Đa' ? 'selected' : '' }}>Đống Đa</option>
                                <option value="Thanh Xuân" {{ old('brand_keyword', $data->brand_keyword) === 'Thanh Xuân' ? 'selected' : '' }}>Thanh Xuân</option>
                                <option value="Cầu Giấy" {{ old('brand_keyword', $data->brand_keyword) === 'Cầu Giấy' ? 'selected' : '' }}>Cầu Giấy</option>
                            </select>
                            @error('brand_keyword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Mô Tả</label>
                            <input type="text" value="{{ old('brand_description', $data->brand_description) }}" name="brand_description" class="form-control">
                            @error('brand_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Sửa Khu Vực - Địa chỉ</button>
          <a href="/admin/brands" class="btn btn-primary pull-right">Danh Khu Vực - Địa chỉ</a>
        <div class="clearfix"></div>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection
