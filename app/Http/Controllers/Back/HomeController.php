<?php

namespace App\Http\Controllers\Back;

use App\Model\Messages;
use App\Model\Order;
use App\Model\Products;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        // Get count users
        $users = User::count();
        // Get count orders
        $ordersCount = Order::where('cancel', 0)->count();
        // Get count products
        $products = Products::count();
        // Get count messages
        $messagesCount = Messages::count();
        //  Get latest 5 orders
        $orders = Order::orderBy('orders.id', 'DESC')->limit(5)->get();
        //  Get latest 5 messages
        $messages = Messages::orderBy('id', 'DESC')->limit(5)->get();

        return view('admin.index', [
            'users' => $users,
            'ordersCount' => $ordersCount,
            'products' => $products,
            'messagesCount' => $messagesCount,
            'orders' => $orders,
            'messages' => $messages,
        ]);
    }

}
