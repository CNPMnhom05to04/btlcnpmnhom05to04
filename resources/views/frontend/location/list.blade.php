@extends('frontend.layout')

@section('content')
    <section class="htc__contact__area ptb--100 bg__white background-location">
        @include('frontend.note')
        <div class="container">
            <div class="row" style="display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <button type="button" class="btn" style="margin-bottom: 20px" onclick="window.history.back()">Quay lại</button>
                    <div class="map-contacts--2">
                        <iframe style="width: 100% !important; height: 500px" src="{{$data[0]['brand_description']}}" ></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
