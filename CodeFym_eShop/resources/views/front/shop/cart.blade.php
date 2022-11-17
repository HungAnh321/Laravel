@extends('front.layout.master')
@section('title', 'Cart Products')
@section('body')

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i onclick="confirm('Bạn có chắc chắn muốn xóa toàn bộ ?') === true ? destroyCart() : ''"
                                           style="cursor: pointer" class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(Cart::count()>0)
                            @foreach($carts as $carts)
                                <tr data-rowid="{{$carts->rowId}}">
                                    <td class="cart-pic first-row"><img style="padding-left: 26%; height: 120px" src="front/img/products/{{$carts->options->images[0]->path}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$carts->name}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{number_format($carts->price)}} VND</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$carts->qty}}" data-rowid="{{$carts->rowId}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{number_format($carts->price * $carts->qty) }} VND</td>
                                    <td class="close-td first-row">
                                        <i onclick="removeCart('{{$carts->rowId}}')" class="ti-close"></i>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    @else
                        <br>
                    <div class="col-lg-12">
                        <h4>Giỏ hàng của bạn đang trống!</h4>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>{{$total}} VND</span></li>
                                    <li class="cart-total">Total <span>{{$subtotal}} VND</span></li>
                                </ul>
                                <a href="./checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection
