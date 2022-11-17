<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Sevice\Blogs\BlogsSeviceInterface;
use App\Sevice\Product\ProductSeviceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productSevice;
    private $blogsSevice;
    public function __construct(ProductSeviceInterface $productSevice, BlogsSeviceInterface $blogsSevice)
    {
        $this->productSevice = $productSevice;
        $this->blogsSevice = $blogsSevice;
    }

    public function index(){

        $featuredProducts = $this->productSevice->getFeaturedProducs();

        $blogs = $this->blogsSevice->getLatestBlogs();

        return view('front.index', compact('featuredProducts', 'blogs'));
    }
}
