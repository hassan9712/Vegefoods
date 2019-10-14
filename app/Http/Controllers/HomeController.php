<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Slider;
use App\Customer;
use App\Logo;
use App\Blog;
use App\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        $products = Product::all();

        $customers = Customer::all();

        $categories = Category::all();

        $logos = Logo::all();

        return view('website.index', compact('sliders', 'customers', 'products', 'logos', 'categories'));
    }

    public function shop()
    {
        $categories = Category::all();

        $products = Product::all();

        return view('website.shop', compact('categories', 'products'));
    }

    public function blog()
    {
        $blogs = Blog::all();

        return view('website.blog', compact('blogs'));
    }

    public function contact()
    {
        $contacts = Contact::all();

        return view('website.contact-us', compact('contacts'));
    }

    public function about()
    {
        $customers = Customer::all();

        return view('website.about', compact('customers'));
    }
}


