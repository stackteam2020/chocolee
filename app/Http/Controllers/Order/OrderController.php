<?php

namespace App\Http\Controllers\Order;

use Session;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Product;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $orders = Order::all();
       return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        // Your Account SID and Auth Token from twilio.com/console
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
        
        $sid = 'ACf1980e5902a3d4895b126099be252d91';
        $token = 'ea53efa15b639bd76f9b89ca3d19650e';
        $client = new Client($sid, $token);
        
        // Use the client to do fun stuff like send text messages!
        $client->messages->create(
            // the number you'd like to send the message to
            '+201119119255',
            [
                // A Twilio phone number you purchased at twilio.com/console
                'from' => '+13392202776',
                // the body of the text message you'd like to send
                'body' => 'Hey Jenny! Good luck on the bar exam!'
                ]
            );
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order_details = $order->order_details;
        return view('orders.show', compact('order_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
