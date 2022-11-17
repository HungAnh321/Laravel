@extends('front.layout.master')
@section('title', 'Product')
@section('body')
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('front.shop.components.product-sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="/front/img/products/{{$products->productImage[0]->path}}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach($products->productImage as $productImage)
                                    <div class="pt active" data-imgbigurl="front/img/products/{{$productImage->path}}"><img
                                            src="front/img/products/{{$productImage->path}}" alt=""></div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{$products->tag}}</span>
                                    <h3>{{$products->name}}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    @for($i = 1; $i <=5; $i++)
                                        @if($i <= $products->avgRating)
                                    <i class="fa fa-star"></i>
                                        @else
                                    <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                    <span>({{count($products->productComments)}})</span>
                                </div>
                                <div class="pd-desc">

                                    <p>{{$products->content}}</p>
                                    @if($products->discount != null)
                                    <h4>{{$products->discount}} VND<span>{{$products->price}}</span></h4>
                                    @else
                                    <h4>{{$products->price}}</h4>
                                    @endif

                                </div>
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">

                                        @foreach(array_unique(array_column($products->productDetails->toArray(), 'color')) as $productColor)
                                        <div class="cc-item">
                                            <input type="radio" id="cc-{{$productColor}}">
                                            <label for="cc-{{$productColor}}" class="cc-{{$productColor}}"></label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    @foreach(array_unique(array_column($products->productDetails->toArray(), 'size')) as $productSize)
                                    <div class="sc-item">
                                        <input type="radio" id="sm-{{$productSize}}">
                                        <label for="sm-{{$productSize}}">{{$productSize}}</label>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                    <a href="#" class="primary-btn pd-cart">Add To Cart</a>
                                </div>

                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: {{$products->productCategory->name}}</li>
                                    <li><span>TAGS</span>: {{$products->tag}}</li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku : {{$products->sku}}</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        {!!$products->description!!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        @for($i =1; $i<=5; $i++)
                                                            @if($i <= $products->avgRating)
                                                        <i class="fa fa-star"></i>
                                                            @else
                                                        <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                        <span>({{count($products->productComments)}})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">{{$products->price}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">{{$products->qty}} in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight">{{$products->weight}}kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach(array_unique(array_column($products->productDetails->toArray(), 'size')) as $productSize)
                                                            {{$productSize}}
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td>
                                                    @foreach(array_unique(array_column($products->productDetails->toArray(), 'color')) as $productColor)
                                                        {{$productColor}}
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">{{$products->sku}}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{count($products->productComments)}} Bình luận</h4>
                                        <div class="comment-option">
                                            @foreach($products->productComments as $productComments)
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="front/img/user/{{$productComments->user->avatar ?? 'default.jpg'}}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        @for($i =1; $i<=5; $i++)
                                                            @if($i <= $productComments->rating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor

                                                    </div>
                                                    <h5>{{$productComments->name}}<span>{{date('M d, Y', strtotime($productComments->created_at))}}</span></h5>
                                                    <div class="at-reply">{{$productComments->messages}}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="leave-comment">
                                            <h4>Để lại bình luận</h4>
                                            <form action="" method="post" class="comment-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$products->id}}">
                                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id ?? null}}">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name" name="name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email" name="email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages" name="messages"></textarea>

                                                        <div class="personal-rating">
                                                            <h6>Đánh giá sao</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relateProducts as $products)
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="front/img/products/{{$products->productImage[0]->path}}" alt="">
                            @if($products->discount!=null)
                            <div class="sale">Sale</div>
                            @endif
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="shop/product/{{$products->id}}">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$products->tag}}</div>
                            <a href="shop/product/{{$products->id}}">
                                <h5>{{$products->name}}</h5>
                            </a>
                            <div class="product-price">
                                @if($products->discount!=null)
                                {{$products->discount}} VND
                                <span>{{$products->price}}</span>
                                @else
                                {{$products->price}} VND
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
@endsection