@extends('front.layout.master')
@section('title', 'Product Details')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    @include('front.shop.components.product-sidebar')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">

                                <form action="">
                                <div class="select-option">
                                    <select name="sort_by" onchange="this.form.submit();" class="sorting">
                                        <option {{request('sort_by') == 'latest' ? 'selected' : ''}} value="latest">Sắp xếp: Mới nhất</option>
                                        <option {{request('sort_by') == 'oldest' ? 'selected' : ''}}  value="oldest">Sắp xếp: Cũ nhất</option>
                                        <option {{request('sort_by') == 'price_acs' ? 'selected' : ''}} value="price_acs">Sắp xếp: Giá cao đến thấp</option>
                                        <option {{request('sort_by') == 'price_dec' ? 'selected' : ''}} value="price_dec">Sắp xếp: Giá thấp đến cao</option>
                                        <option {{request('sort_by') == 'name_acs' ? 'selected' : ''}} value="name_acs">Sắp xếp: Theo tên A-Z</option>
                                        <option {{request('sort_by') == 'name_dec' ? 'selected' : ''}} value="name_dec">Sắp xếp: Theo tên Z-A</option>
                                    </select>
                                    <select name="show" onchange="this.form.submit();" class="p-show">
                                        <option {{request('show') == '6' ? 'selected' : ''}} value="6">Hiển thị: 6</option>
                                        <option {{request('show') == '9' ? 'selected' : ''}} value="9">Hiển thị: 9</option>
                                        <option {{request('show') == '12' ? 'selected' : ''}} value="12">Hiển thị: 12</option>
                                    </select>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="front/img/products/{{$product->productImage[0]->path}}" alt="">
                                        @if($product->discount != null)
                                        <div class="sale pp-sale">Sale</div>
                                        @endif
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="javascript:addCart({{$product->id}})"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="shop/product/{{$product->id}}">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{$product->tag}}</div>
                                        <a href="shop/product/{{$product->id}}">
                                            <h5>{{$product->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                            @if($product->discount != null)
                                            {{$product->discount}} VND
                                            <span>{{$product->price}} VND</span>
                                            @else
                                                {{$product->price}} VND
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
@endsection
