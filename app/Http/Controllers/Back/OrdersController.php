<?php

namespace App\Http\Controllers\Back;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Validator;

class OrdersController extends Controller
{

    /**
     * Get all orders
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::orderBy('orders.id', 'DESC')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.username')
            ->get();

        return view('admin.orders.index', ['orders' => $orders]);
    }


    /**
     * Change status order in Db
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function changeStatus(Request $request)
    {
        if($request->ajax()) {

            // validation data Country
            $validator = Validator::make($request->all(), [
                'order' => 'required|numeric',
                'status' => 'required|in:pending,shipping,arrived',
            ]);

            // if get errors validations
            if ($validator->fails()) {
                return response(['status' => false, 'messages' => $validator->errors()]);

            } else {
                // Get data order
                $order = Order::where('id', $request->input('order'))
                    ->where('cancel', 0)
                    ->first();

                // Check if true data
                if($order) {
                    // Update Status Order
                    $order->update(['status' => $request->input('status')]);

                    return response([
                        'status' => true,
                        'message' => 'Status Updated Successfully'
                    ]);

                } else {

                        return response(['status' => false, 'message' => 'Please enter correct data']);
                }
            }
        }
    }


    /**
     * View Details Order
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // Get order Data
        $order = Order::where('orders.id', $id)
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.username')
            ->with('details')
            ->first();
        // if not get data
        if(!$order)
            abort(404);

        return view('admin.orders.view', ['order' => $order]);
    }


    /**
     * Delete Order from DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // Get data Order
        $order = Order::find($id);
        // If not get data order
        if(!$order)
            abort(404);

        // delete order
        $order->delete();

        Session::flash('success', 'Order Deleted Successfully');
        return redirect('admin/orders');
    }


    /**
     * Multi Delete Orders
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function multiDelete(Request $request)
    {
        $this->validate($request, [
            'orders' => 'required|array'
        ]);

        // Delete Selected Orders
        Order::whereIn('id', $request->input('orders'))->delete();

        Session::flash('success', 'Orders Selected Deleted Successfully');
        return redirect('admin/orders');
    }


}
