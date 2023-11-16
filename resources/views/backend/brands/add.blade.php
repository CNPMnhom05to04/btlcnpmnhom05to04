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
              <h4 class="card-title">Thêm Loại Khối Lượng</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Khối Lượng</label>
                            <select name="brand_name" class="form-control">
                                <option value="" selected disabled>Chọn Khối Lượng</option>

                                <option value="0.1">100 gram</option>
                                <option value="0.2">200 gram</option>
                                <option value="0.5">500 gram</option>
                                <option value="1">1 kg</option>
                            </select>
                            @error('brand_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Từ Khóa</label>
                        <select name="brand_keyword" class="form-control">
                            <option value="" selected disabled>Chọn Từ Khóa</option>

                            <option value="100 gram">100 gram</option>
                            <option value="200 gram">200 gram</option>
                            <option value="500 gram">500 gram</option>
                            <option value="1 kg">1 kg</option>
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
            <button type="submit" class="btn btn-primary pull-right">Xác nhận
            </button>
          <a href="/admin/brands" class="btn btn-primary pull-right">Huỷ
          </a>
        <div class="clearfix"></div>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection
