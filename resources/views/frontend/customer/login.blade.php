@extends('frontend.layout')

@section('content')
    <div class="container" style="margin-top: 80px; margin-bottom: 100px">
        <div class="row">
           @include('frontend.note')
            <div class="col-md-5">
                <p style="color: #0d0d0d; font-size: 4em; margin-bottom: 10px; text-align: center">Đăng Nhập</p>
                <form action="/customer/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="user_email" class="form-control">
                        @error('user_email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="user_password" class="form-control">
                        @error('user_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group row mb-0">
                    <div class=" form-group offset-md-4 text-center">
                        <button type="submit" class="btn">Đăng nhập</button>
                    </div>
                    </div>
                </form>
            </div>

            <div class="col-md-2 mt--100 mb--100">
                <center>
                    <div class="or" style="text-align: center; width: 50px; height: 50px; background: #c43b68; color: #fff; border-radius: 50%; line-height: 50px">
                        OR
                    </div>
                </center>
            </div>

            <div class="col-md-5">
                <p style="color: #0d0d0d; font-size: 4em; margin-bottom: 10px; text-align: center">Đăng ký</p>

                <form action="/customer/register" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Họ Tên</label>
                        <input type="text" name="user_name" class="form-control">
                        @error('user_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="user_email" class="form-control">
                        @error('user_email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="user_password" class="form-control">
                        @error('user_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Xác Nhận Password</label>
                        <input type="password" name="user_password_again" class="form-control">
                        @error('user_password_again')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class=" form-group offset-md-4 text-center">
                        <button type="submit" class="btn">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
