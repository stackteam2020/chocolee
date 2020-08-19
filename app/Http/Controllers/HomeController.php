<?php

namespace App\Http\Controllers;

use Auth;
use App\Model\Order;
use App\Model\Product;
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
        return view('home');
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
        $new_order->user_name = $request->user_name;
        $new_order->user_phone = $request->user_phone;
        $new_order->user_address = $request->user_address;
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