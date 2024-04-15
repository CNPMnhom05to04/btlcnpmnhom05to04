@extends('frontend.layout')

@section('content')
    <div class="container" style="margin-top: 50px; margin-bottom: 50px">
        @include('frontend.note')
        <div class="row">
            <center><p style="color: #c43b68; font-size: 2em">Danh sách đặt sân </p></center>
        </div>
        <br>
        <div class="row mt-5">
            <div class="col-md-3 ">
                @include('frontend.customer.menu')
                <form action="/customer/logout" method="post">
                    @csrf
                    <button class="btn" style="color: #c43b68; border: 1px solid #c43b68; background: transparent; border-radius: 0">Đăng Xuất</button>
                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                <th class="text-primary">Ngày đặt</th>
                                <th class="text-primary">Tên sân</th>
                                <th class="text-primary">Địa điểm</th>
                                <th class="text-primary">Thời gian</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td class="text-info">{{date('d/m/Y',strtotime($item->created_at))}}</td>
                                    <td class="text-info">{{($item->product_name)}}</td>
                                    <td class="text-info">{{($item->brand_name)}}</td>
                                    <td class="text-info">{{date('d/m/Y',strtotime($item->start_time))}} {{date('H:i:s',strtotime($item->start_time))}} - {{date('H:i:s',strtotime($item->end_time))}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
