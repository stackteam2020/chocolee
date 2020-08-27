<?php

namespace App\Http\Controllers;

use Auth;
use App\Model\Order;
use App\Model\Product;
use App\Model\Category;
use App\Model\OrderDetails;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(3)->get();
        return view('welcome', compact('categories'));
    }

    public function products()
    {
        $products = Product::paginate(12);
        $categories = Category::all();
        return view('front.products', compact('products', 'categories'));
    }

    public function filter_products($category_id)
    {
        $filtered_products = Product::where('category_id', $category_id)->paginate(12); 
        return $filtered_products;
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contactus');
    }

    public function cart()
    {
        return view('front.checkout');
    }

    public function store()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function checkout(Request $request)
    {
        $order_products = json_decode($request->cart);
        $new_order = new Order;
        $new_order->user_name = $request->name;
        $new_order->user_phone = $request->phone;
        $new_order->user_address = $request->address;
        $new_order->flag = 'cash on delivery';
        $new_order->status = 'pending';
        $new_order->save();

        foreach($order_products as $order) {
            $order_details = new OrderDetails;
            $order_details->order_id = $new_order->id;
            $order_details->product_name = $order->name;
            $order_details->product_image = $order->image;
            $order_details->product_price = $order->price;
            $order_details->quantity = $order->quantity;
            $order_details->total = $order->quantity * $order->price;
            $order_details->save();
        }
        
        return redirect()->route('home');
    }
}
