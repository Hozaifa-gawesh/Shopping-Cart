<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

trait Cart {


    /**
     * Add Item in Cart
     * @param $session
     * @param $key
     * @param $item
     */
    public static function add($session, $key, $item)
    {
        // if has session cart and product id not existed in session
        if (Session::has($session) && !array_key_exists($key, Session::get($session))) {
            Session::put($session.'.'.$key, $item);

        } else {
            Session::put($session.'.'.$key, $item);
        }
    }


    /**
     * Update Item in Cart
     * @param $session
     * @param $key
     * @param $item
     */
    public static function update($session, $key, $item)
    {
        Self::remove($session, $key);

        Session::put($session.'.'.$key, $item);
    }

    /**
     * Get total prices items from cart
     * @param $session
     * @param $column
     * @return float|int
     */
    public static function total($session, $column)
    {
        if(Session::has($session)) {
            // Get columns price
            $columns = array_column(Session::get($session), $column);
            // sum columns price
            return array_sum($columns);
        }

        return 0;
    }


    /**
     * remove specific item from cart
     * @param $session
     * @param $key
     * @return bool
     */
    public static function remove($session, $key)
    {
        if (Session::has($session) && array_key_exists($key, Session::get($session))) {
            // Delete key from array
            Session::forget($session . '.' . $key);

            return true;
        }

        return false;
    }


    /**
     * Destroy session cart
     * @param $session
     * @return bool
     */
    public static function destroy($session)
    {
        return Session::forget($session);
    }


    /**
     * Get content cart
     * @param $session
     * @return mixed
     */
    public static function content($session)
    {
        return Session::get($session);
    }


    /**
     * Get specific item from cart
     * @param $session
     * @param $key
     * @return mixed
     */
    public static function get($session, $key)
    {
        return Session::get($session.'.'.$key);
    }


    /**
     * Get Keys from session cart
     * @param $session
     * @return array
     */
    public static function keys($session)
    {
        if(Session::has($session)) {
            return array_keys(Session::get($session));
        }

        return [];
    }


    /**
     * Get count cart
     * @return int
     */
    public static function count()
    {
        return collect(Session::get('cart'))->count();
    }


    /**
     * Check session cart
     * @param $session
     * @return bool
     */
    public static function check($session)
    {
        if(Session::has($session)) {
            return true;
        }
        return false;
    }

}