<?php

namespace App\Http\Controllers\Front;

use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Cart;
use App\Model\Cart as ShoppingCart;


class CartController extends Controller
{

    use Cart;

    /**
     * Get items from cart
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $productsIds = auth()->check() ?
            ShoppingCart::where('user_id', auth()->user()->id)->get()->pluck('product_id')->toArray()
            : Cart::keys('cart');

        $products = Products::whereIn('id', $productsIds)->with('cart')->get();
        $total = auth()->check() ? ShoppingCart::where('user_id', auth()->user()->id)->sum('price') : Cart::total('cart', 'price');

        return view('front.cart.index', ['products' => $products, 'total' => $total]);
    }


    /**
     * Store Products in Session Card
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            // validation data Country
            $validator = Validator::make($request->all(), [
                'product' => 'required|string',
            ]);
            // if get errors validations
            if ($validator->fails()) {
                return response(['status' => false, 'messages' => $validator->errors()]);

            } else {
                // Get data product by id
                $product = Products::find($request->input('product'));
                // Check if true data
                if($product) {

                    $item = [
                        'user_id' => auth()->user() != null ? auth()->user()->id : null,
                        'product_id' => $product->id,
                        'quantity' => 1,
                        'price' => $product->price_discount
                    ];

                    // Add Item in Cart
                    Cart::add('cart', $product->id, $item);
                    // if exist auth
                    if(auth()->check())
                    {
                        // check if same product existing in DB
                        $check = ShoppingCart::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first();

                        if(!$check) {
                            // Store Data in DB
                            ShoppingCart::create($item);

                        } else {
                            return response(['status' => false, 'message' => 'This product already exist']);
                        }

                    }

                    return response([
                        'status' => true,
                        'cart' => auth()->check() ? ShoppingCart::where('user_id', auth()->user()->id)->count() : Cart::count(),
                        'message' => 'Product Added To Cart Successfully'
                    ]);

                } else {

                    return response(['status' => false, 'message' => 'Please enter correct data']);
                }
            }
        }
    }


    /**
     * Update items in Cart
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()) {

            // validation data Country
            $validator = Validator::make($request->all(), [
                'product' => 'required|numeric',
                'quantity' => 'required|numeric',
            ]);

            // if get errors validations
            if ($validator->fails()) {
                return response(['status' => false, 'messages' => $validator->errors()]);

            } else {
                // Get data product by slug
                $product = Products::find($request->input('product'));
                // Check if true data
                if($product) {
                    $item = [
                        'user_id' => auth()->user() != null ? auth()->user()->id : null,
                        'product_id' => $product->id,
                        'quantity' => $request->input('quantity'),
                        'price' => $product->price_discount * $request->input('quantity')
                    ];

                    Cart::update('cart', $product->id, $item);

                    if(auth()->check())
                    {
                        // Update item in DB
                        ShoppingCart::where('product_id', $product->id)->update($item);
                    }

                    return response([
                        'status' => true,
                        'price' => $product->price_discount * $request->input('quantity'),
                        'cart' => auth()->check() ? ShoppingCart::where('user_id', auth()->user()->id)->count() : Cart::count(),
                        'total' => Cart::total('cart', 'price'),
                        'message' => 'Product Added To Cart Successfully'
                    ]);

                } else {

                    return response(['status' => false, 'message' => 'Please enter correct data']);
                }
            }
        }
    }


    /**
     * Delete item from cart
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteItem(Request $request)
    {
        $key = $request->input('item');
        // Delete item from cart
        if(Cart::remove('cart', $key)) {
            // if exist auth
            if (auth()->check()) {
                // Delete item from DB
                ShoppingCart::where('product_id', $key)->delete();
            }

        } elseif (auth()->check()) {
            // Delete item from DB
            ShoppingCart::where('product_id', $key)->delete();

        } else {
            Session::flash('warning', 'Please enter correct item');
        }

        Session::flash('success', 'Item Removed Successfully');
        return redirect('cart');
    }


    /**
     * When login user check if has session cart and store data in DB
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function CheckCart()
    {
        // Check if has session cart
        if(Cart::check('cart')) {
            // Get all products ids related to user id from cart and flip products id array keys
            $keys = array_flip(ShoppingCart::where('user_id', auth()->user()->id)->get()->pluck('product_id')->toArray());
            // Get difference keys 
            $diff = array_diff_key(Cart::content('cart'), $keys);

            if (count($diff) > 0) {
                foreach ($diff as $cart) {
                    // set value user id with new value
                    $cart['user_id'] = auth()->user()->id;
                    // remove row from session array cart
                    Cart::remove('cart', $cart['product_id']);
                    // add new item
                    Cart::add('cart', $cart['product_id'], $cart);
                    // Store data session cart in DB
                    ShoppingCart::create($cart);
                }
            }
        }

        return redirect('/');
    }

}
