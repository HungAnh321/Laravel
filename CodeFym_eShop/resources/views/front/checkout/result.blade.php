@extends('front.layout.master')
@section('title', 'Result')
@section('body')

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">

                <div class="row">
                        <div class="col-lg-12">
                            <h4>{{$notification}}</h4>
                        </div>
                    <a href="./" class="primary-btn mt-5">Tiếp tục mua hàng</a>
                </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
