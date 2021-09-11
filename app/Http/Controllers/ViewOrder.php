<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ViewOrder extends Controller
{
    public function index($id)
    {
        $result = DB::table('orders')->where('id', $id)->get();
        foreach ($result as $res) {
            $orderNumber = $res->id;
        }
        return view('user.order.view', ['orderDetails' => $result, 'orderNumber' => $orderNumber, 'orderId' => $id]);
    }

    public function writerView($id)
    {
        $result = DB::table('orders')->where('id', $id)->get();
        foreach ($result as $res) {
            $orderNumber = $res->id;
        }
        return view('writer.order.view', ['orderDetails' => $result, 'orderNumber' => $orderNumber, 'orderId' => $id]);
    }

    public function returnOrder($id)
    {
        $result = DB::table('orders')->where('id', $id)->first();
       
        return view('user.order.returnorder', ['orderDetails' => $result, 'orderId' => $id]);
    }
}
