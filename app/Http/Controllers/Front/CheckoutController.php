<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\CheckOut\Store;
use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function index()
    {
        $query = Cart::where('carts.user_id', auth()->user()->id);
        // Get count data related user login
        $products = $query->join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.*', 'products.title', 'products.description', 'products.price_discount', 'products.image')
            ->get();

        // Get total price
        $total = $query->sum('carts.price');

        // if count data equal zero return cart page
        if(count($products) == 0) {
            return redirect('cart');
        }

        return view('front.cart.checkout', ['products' => $products, 'total' => $total]);
    }


    /**
     * Confirm Order
     * @param Store $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirm(Store $request)
    {
        $query = Cart::where('carts.user_id', auth()->user()->id);
        // Get total price
        $total = $query->sum('price');
        // Get data from request
        $data = $request->all();
        // Set new item total in data array
        $data['total'] = $total;
        // Set new item user id in data array
        $data['user_id'] = auth()->user()->id;
        // Store Data in Order
        $order = Order::create($data);

        // Get details cart
        $details = $query->get(['product_id', 'quantity', 'price']);
        // push new item order id inside details
        $details->map(function ($add) use ($order) {
            $add['order_id'] = $order->id;
        });

        // convert data collection to array
        $details = $details->toArray();
        // Store Details order in DB
        OrderDetails::insert($details);

        // Empty Data in Cart
        $query->delete();
        // Empty Cart Session
        Session::forget('cart');

        Session::flash('success', 'Order Confirmed Successfully');
        return redirect('orders');
    }

}
