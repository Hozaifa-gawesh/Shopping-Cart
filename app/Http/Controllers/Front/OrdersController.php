<?php

namespace App\Http\Controllers\Front;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function index()
    {
        // Get Order with details order related to user login
        $orders = Order::orderBy('id', 'DESC')
            ->where('cancel', '0')
            ->where('user_id', auth()->user()->id)
            ->with('details')
            ->get();

        return view('front.orders.index', ['orders' => $orders]);
    }


    /**
     * Cancel Order
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cancel(Request $request)
    {
        // Get order id from request
        $orderId = $request->input('order');
        // Get order data where user login & status not equal arrived & cancel equal zero
        $order = Order::where('id', $orderId)
            ->where('user_id', auth()->user()->id)
            ->where('status', '!=', 'arrived')
            ->where('cancel', 0)
            ->first();
        // if not get order data
        if(!$order)
            abort(404);

        // Update order to cancel
        $order->update(['cancel' => 1]);

        Session::flash('success', 'Order Canceled Successfully');
        return redirect('orders');
    }

}
